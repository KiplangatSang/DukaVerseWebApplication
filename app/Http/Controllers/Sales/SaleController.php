<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\BaseController;
use App\Repositories\RevenueRepository;
use App\Repositories\SalesRepository;
use App\Repositories\StockRepository;
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
        if (!$this->salesrepo) {
            return redirect('/home')->with('message', __('retail.select'));
        }

        $allSales = $this->salesrepo->getDisctictSoldItems();

        $solditemscount = count($allSales);
        $salesTotalPrice = $this->retail->sales()->sum('price');
        $salesrevenue = $this->salesrepo->getRevenue();
        $meansales = $this->retail->sales()->Avg('itemAmount');
        $growth = $this->salesrepo->getProfitPercentage();
        $growth = round($growth, 2);

        $salesdata = array(
            'allSales' =>  $allSales,
            'solditemscount' => $solditemscount,
            'salesTotalPrice' => $salesTotalPrice,
            'salesrevenue' => $salesrevenue,
            'meansales' => $meansales,
            'growth' => $growth,
        );

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
        $this->salesRepository();
        $stockdata = array(
            "allStock"  => $this->retail->stocks()->get(),

        );


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
    public function show($id)
    {
        $this->salesRepository();
        //
        $soldItemName = Sales::where('id', $id)->first()->itemName;
        $allSales = $this->salesrepo->getSaleItem('itemName', $soldItemName);
        $salesdata = array(
            'allSales' =>  $allSales,
        );

        // dd($allSales);
        return view('client.sales.show', compact('salesdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getSalesItems($key)
    {
        # code...
        $item = null;
        $salesRepo = $this->salesRepository();;
        $item = $salesRepo->getStockById($key);
        if (!$item)
            return;

        $transactionItem["name"] = $item->stockNameId;
        $transactionItem["amount"] = 1;

        $transactionResult = $this->saveTransaction($transactionItem);

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
            foreach ($a as $name) {
                // return $name->stockNameId;
                if (stristr($q, substr($name->stockNameId, 0, $len))) {
                    if ($hint === "") {
                        $hint = $name->stockNameId;
                        $hint['image'] = $name->stockImage;
                    } else {
                        // dd("bfore ".$hint);
                        $hint['item'] .= ", $name->stockNameId";
                        $hint['image'] = $name->stockImage;
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
        $result['body'] = "Kiplangat Sang";

        return  $result;
    }

    public function saveTransaction($items)
    {
        # code...
        $new_items = array();
        $old_items = array();
        $transId = Str::random($this->TRANSACTIONSTRLEN);

        $transController = new SaleTransactionController();
        $activeTrns = $transController->getActiveTransaction();


        if ($activeTrns) {
            $transId = $transController->getActiveTransaction()->transaction_id;
            $old_items = $transController->getActiveTransaction()->transaction_items;
            //cast items to array
            $old_items = (array)json_decode($old_items);
        }
        //push items to the old array
        array_push($old_items, $items);


        $result = $transController->storeTransactionItems($transId, $old_items);

        if (!$result)
            return false;
        //dd(count($old_items));
        return $transId;
    }


    //@todo remove sold item
   // removeStockItem($id)
}
