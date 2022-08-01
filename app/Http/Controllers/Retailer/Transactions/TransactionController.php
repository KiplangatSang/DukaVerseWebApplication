<?php

namespace App\Http\Controllers\Retailer\Transactions;

use App\Helpers\Billing\OrderDetails;
use App\Helpers\Billing\PaymentGatewayContract;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Retailer\payments\mpesa\MpesaController;
use App\Repositories\TransactionsRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    protected function transactionRepository()
    {
        $retail = $this->getRetail();
        $transactionRepo = new TransactionsRepository($retail);
        return  $transactionRepo;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions =  $this->transactionRepository()->getTransactions();
        $transactiondata['transactions'] = $transactions;
        $transactiondata['amount'] = $transactions->sum('total_amount');
        return view('client.transactions.index', compact('transactiondata'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(OrderDetails $orderdetails, PaymentGatewayContract  $payment)
    {
        //
        $amount = 1;

        $trans_data = $this->saveTransaction(
            "MPESA",
            $amount,
            $amount,
            0,
            "ksh",
            "SUPPLIES",
            "Retail Goods Payment",
            1,
            $orderdetails,
            $payment
        );
        if (!$trans_data)
            dd($trans_data);
        dd($trans_data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, OrderDetails $orderdetails, PaymentGatewayContract  $payment)
    {

        $request->validate(
            [
                'gateway' => ['required'],
                'amount' => ['required'],
                'transaction_type' => ['required'],
                'cost' => ['required'],
                'currency' => ['required'],
                'purpose' => ['required'],
            ]
        );

        $transactiondata = $this->storeTransaction($request);
        if ($request->gateway == "CASH")
            return $transactiondata;

        $order = $orderdetails->all($transactiondata);

         $result = $payment->charge($transactiondata);

        return  $result;
    }


    public function storeTransaction(Request $request)
    {
        # code...
        $transactiondata =  $this->transactionRepository()->saveTransaction(
            $request->gateway ?? null,
            $request->accounts_id ?? null,
            $request->amount ?? null,
            $request->message ?? null,
            $request->transaction_type ?? null,
            $request->cost ?? null,
            $request->currency ?? null,
            $request->purpose ?? null,
            $request->purpose_id ?? null,
        );

        return  $transactiondata;
    }

    public function setPurposeable($purpose)
    {
        # code...
        if ($purpose == "SALES") {
            $purposable_type = "App\Sales\Sales";
        } else if ($purpose == "LOANS") {
            $purposable_type = "App\Loans\Loans";
        } else if ($purpose == "SUPPLIES") {
            $purposable_type = "App\Supples\Supplies";
        } else {
            $purposable_type = null;
        }

        return   $purposable_type;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $transaction =  $this->transactionRepository()->getTransaction($id);
        $transactiondata['transaction'] = $transaction;
        return view('client.transactions.show', compact('transactiondata'));
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
}


            // $request = new \Illuminate\Http\Request();
        // $request->setMethod('POST');
        // $request->request->add(['mpesadata' =>  $mpesadata]);


        // $mpesaCont = new MpesaController();
        // $mpesaRes = $mpesaCont->stkPush($request);


        // if (!$mpesaRes)
        //     return false;
