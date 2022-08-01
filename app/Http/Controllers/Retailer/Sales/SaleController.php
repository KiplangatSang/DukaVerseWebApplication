<?php

namespace App\Http\Controllers\Retailer\Sales;

use App\Helpers\Billing\OrderDetails;
use App\Helpers\Billing\PaymentGatewayContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\payments\mpesa\MpesaController;
use App\Http\Controllers\Retailer\payments\mpesa\MpesaController as MpesaMpesaController;
use App\Repositories\RevenueRepository;
use App\Repositories\SalesRepository;
use App\Repositories\StockRepository;
use App\Repositories\TransactionsRepository;
use App\Sales\Sales;
use App\Stock\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SaleController extends BaseController
{

    private $salesrepo;
    private $retail;
    protected  $TRANSACTIONSTRLEN = 20;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function salesRepository()
    {
        # code...
        $this->retail = $this->getRetail();
        if (!$this->retail)
            return false;

        return  new SalesRepository($this->retail);
    }

    public function index()
    {
        $this->salesrepo = $this->salesRepository();

        $salesdata = $this->salesrepo->indexData();

        // dd( $salesdata);
        return view("client.sales.index", compact('salesdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $stockdata = $this->salesRepository()->createData();
        //
        return view("client.sales.create", compact('stockdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $retail = $this->getRetail();
        request()->validate(
            [
                'itemNameId' => 'required',
                'itemName' => 'required',
                'description' => 'required',
                'itemAmount' => 'required',
                'itemImage' => ['required', 'image'],
                'price' => 'required'
            ]
        );

        $this->salesRepository()->saveSalesItem($request->all());

        $revenueRepo = new  RevenueRepository($retail);
        $revenueRepo->saveRevenue($request->price);

        return redirect("/client/sales/index");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($item_id)
    {
        $salesdata = $this->salesRepository()->showData($item_id);

        // dd($allSales);
        return view('client.sales.show', compact('salesdata'));
    }


    public function destroy($id)
    {
        //
        $result = $this->salesRepository()->destroy($id);
        if (!$result)
            return back()->with('error', 'Could not delete this item');;
        return back()->with('success', 'item deleted successfully');
    }

    public function getSalesItems($trans_id, $key)
    {
        # code...

        $item = null;
        $salesRepo = $this->salesRepository();;
        $item = $salesRepo->getStockById($key);
        //return $item;
        if (!$item)
            return false;

        $transactionResult = $this->saveSaleTransaction($trans_id, $item);

        if (!$transactionResult)
            return false;

        $item['transaction_id'] = $transactionResult;
        return $item;
    }

    public function getPrompItems($key)
    {
        # code...
        $hint = array(
            "item" => "",
            "image" => "",
        );
        $stockRepo = new StockRepository($this->getRetail());
        $q = $key;


        $a = $stockRepo->getAllStock();

        // lookup all hints from array if $q is different from ""
        if ($q !== "") {
            $q = strtolower($q);
            $len = strlen($q);
            foreach ($a as $stockItem) {
                // return $name->stockNameId;
                //dd($stockItem);
                if (stristr($q, substr($stockItem->code, 0, $len)) || stristr($q, substr($stockItem->item->brand, 0, $len)) || stristr($q, substr($stockItem->item->name, 0, $len))) {

                    if ($hint === "") {
                        $hint = $stockItem->code;
                        $hint['image'] = $stockItem->item->image;
                    } else {
                        // dd("bfore ".$hint);
                        $hint['item'] .= ", $stockItem->code";
                        $hint['image'] = $stockItem->item->image;
                        //dd("after ".$hint);
                    }
                }
            }
        }
        //dd($hint);
        return $hint;
    }

    //payments section

    public function makePayment($number, $amount)
    {
        # code...
        if ($amount < 1 || $amount == null)
            return false;
        if (strlen($number) < 9 || $number == null)
            return false;

        $result['status'] = true;
        $result['body'] = "Success, The transaction was successfull";

        return  $result;
    }


    public function makeCashPayment($trans_id, $amount,OrderDetails $orderdetails, PaymentGatewayContract  $payment)
    {
        $transaction = $this->getRetail()->salesTransactions()->where('transaction_id', $trans_id)->first();
        if (!$transaction)
            return $this->sendError("error", $transaction);

        // dd($transaction);
        if ($transaction->expense <= $amount) {
            $balance = $amount - $transaction->expense;
            $transaction['balance'] = $balance;

            $retail = $this->getRetail();
            $saletransactions = $retail->salesTransactions()->updateOrCreate(
                ["transaction_id" => $trans_id],
                [
                    "on_hold" => false,
                    "pay_status" => true,
                    "is_active" => true,
                    "paid_amount" => $amount,
                    "balance" => $balance,
                ]
            );

            $saletransaction = $retail->salesTransactions()->where("transaction_id", $saletransactions->transaction_id)->first();
            $gateway = "CASH";
            $purpose = "SALES";
            $message = "Retail Goods Payment";

            $mpesadata = $this->saveTransaction(
                $gateway,
                $amount,
                1,
                0,
                "ksh",
                $purpose,
                $message,
                $saletransaction->id,
                $orderdetails,
                $payment
            );
            if (!$mpesadata)
                return $this->sendError("Could not store transaction", $transaction);

            return $this->sendResponse($transaction, "The transaction is successfull");
        } else
            return $this->sendError("Amount is less than the required amount", $transaction);
    }

    public function closeTransaction($trans_id)
    {
        # code...
        $transaction = $this->getRetail()->salesTransactions()->where('transaction_id', $trans_id)->first();
        if (!$transaction)
            return $this->sendError("error", $transaction);

        if ($transaction->balance < 0)
            return $this->sendError("error", $transaction);

        // dd($transaction);
        $retail = $this->getRetail();
        $transactions = $retail->salesTransactions()->updateOrCreate(
            ["transaction_id" => $trans_id],
            [
                "on_hold" => false,
                "pay_status" => true,
                "is_active" => false,
            ]
        );
        $transaction = $this->getRetail()->salesTransactions()->where('transaction_id', $transactions->transaction_id)->first();

        return $this->sendResponse($transaction, "The transaction is successfull");
    }

    public function makeMpesaPayment($trans_id, $account, $amount,OrderDetails $orderdetails, PaymentGatewayContract  $payment)
    {
        $transaction = $this->getRetail()->salesTransactions()->where('transaction_id', $trans_id)->first();

        if (!$transaction)
            return $this->sendError("error", $transaction);

        $gateway = "MPESA";
        $purpose = "SALES";
        $message = "Retail Goods Payment";

        $mpesadata = $this->saveTransaction(
            $gateway,
            $amount,
            2,
            0,
            "ksh",
            $purpose,
            $message,
            $transaction->id,
            $orderdetails,
            $payment
        );

        dd($mpesadata);

        if (!$mpesadata)
            return $this->sendError("Could not send Request", $transaction);
        if (array_key_exists('errorCode', (array)$mpesadata))
            return $this->sendError($mpesadata['errorMessage'], $transaction);

        return $this->sendResponse($transaction, "The transaction is successfull");
    }


    public function saveSaleTransaction($trans_id, $item)
    {
        # code...
        // $old_items = array();

        $price = $item->items()->first()->selling_price;

        if ($trans_id == "null" || $trans_id == null)
            $trans_id = Str::random($this->TRANSACTIONSTRLEN);



        $transController = new SaleTransactionController();
        $activeTrns = $transController->getActiveTransaction($trans_id);

        if ($activeTrns) {
            $trans_id = $activeTrns->transaction_id;
            $price = $activeTrns->expense + $price;
        }

        //store transaction  and items
        $transacResult = $transController->storeTransactionItems($trans_id, $price);

        if (!$transacResult)
            return false;

        //store sales
        $salesResult  = $this->salesRepository()->addSoldItemFromStock($item, $transacResult->id);
        //dd( $salesResult );
        if (!$salesResult)
            return false;

        //dd(count($old_items));
        return $trans_id;
    }
}
