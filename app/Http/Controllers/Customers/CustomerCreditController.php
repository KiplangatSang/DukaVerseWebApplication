<?php

namespace App\Http\Controllers\Customers;

use App\Customer\CustomerCredit;
use App\Customers\Customers;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Retails\Retail;
use Exception;
use Illuminate\Http\Request;

class CustomerCreditController extends BaseController
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {

        $customers = $this->retail->customers()->where('id',$id)->first();
       $creditItems = $customers->customerCredit()->get();
     //dd($creditItems);

        $custCreditdata = array(
            'customers' => $creditItems,
            'creditItems' => $creditItems,
            'creditItemscount' =>count($creditItems),
        );

        return view('client.customers.credit.index',compact('custCreditdata'));
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
        $request->validate(
            [
                'itemName'=> 'required',
            'itemDescription'=>'required',
            'amount'=> ['required','integer'],
            'requiredAmount'=> ['required'],
            'amountPaid'=> ['required'],
            'retailID'=> 'required',]
            );
            if(session('customer'))
             $cust = session('customer');
            try {
                $cust->create(
                   $request->all(),
                );
                return redirect('/customers/index')->with('success');



            } catch (Exception $ex) {

                $ex->getMessage();
                return back()->with('message',"Could not Update Credit Item");
            }
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

        $customers = $this->retail->customers()->where('id',$id)->first();

       $creditItems = $customers->customerCredit()->get();



     //dd($creditItems);

        $custCreditdata = array(
            'creditItems' => $creditItems,
        );

        return view('client.customers.credit.show',compact('custCreditdata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

       $creditItems = CustomerCredit::where('id',$id)->first();

        $custCreditdata = array(
            'creditItems' => $creditItems,
        );

        return view('client.customers.credit.edit',compact('custCreditdata'));
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

        $request->validate(
        [
            'itemName'=> 'required',
        'itemDescription'=>'required',
        'amount'=> ['required','integer'],
        'requiredAmount'=> ['required'],
        'amountPaid'=> ['required'],
        'retailID'=> 'required',]
        );

        try {
            CustomerCredit::updateOrCreate(
                [ 'id' => $id,
                 'itemName' => $request->itemName,],
                [
                    'itemDescription'=>$request->itemDescription,
                    'amount'=>$request->amount,
                    'requiredAmount'=> $request->requiredAmount,
                    'amountPaid'=> $request->amountPaid,
                    'retailID'=> $request->retailID,
                ]
            );
            return redirect('/customers/index')->with('success');



        } catch (Exception $ex) {

            $ex->getMessage();
            return back()->with('message',"Could not Update Credit Item");
        }
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
        CustomerCredit::destroy($id);
        return redirect('/client/customers/index')->with('message','Deletion Successful');
    }
}
