<?php

namespace App\Http\Controllers\Retailer\Transactions;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\TransactionsRepository;
use Illuminate\Http\Request;

class SupplyTransactionController extends BaseController
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
        //
        $transactions =  $this->transactionRepository()->getSuppliesTransactions();
        $transactiondata['transactions'] = $transactions;
        $transactiondata['amount'] = $transactions->sum('total_amount');
        return view('client.transactions.salestransactions.index', compact('transactiondata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
