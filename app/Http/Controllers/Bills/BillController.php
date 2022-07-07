<?php

namespace App\Http\Controllers\Bills;

use App\Bills\Bills;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\ThirdPartyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class BillController extends BaseController
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
    public function index()
    {

        // $billslist = Bills::all();

        $thirdPartyRepo = new ThirdPartyRepository();
        $thirdPartyImages = $thirdPartyRepo->getThirdPartyImages();
        // $bill = Bills::where('id',$bill_id)->first();
                $billPaymentData = array(
            'thirdPartyImages' => $thirdPartyImages,
            // 'bill'  => $bill,
        );


        //dd($billslist);
        // $billsdata = array(
        //     'billslist' => $billslist,
        // );

        return view('client.bills.index',compact('billPaymentData'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('client.bills.create');
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
        //dd( $request->all());
        return redirect('/bills/index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bill = Bills::where('id',$id)->first();
        $payment = array(
            'payAmount' => $bill->billAmount,
            'payDescription' => $bill->billName,
        );
        Session::put(
                'payment' ,$payment

        );
        return redirect('/bills/payment/index/'.$id);
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
        $retail = $this->getRetail();
        $billslist = $retail->bills->where('id',$id)->first();

        $billsdata = array(
            'customer' => $billslist,
        );

        return view('client.bills.edit',compact('billsdata'));
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
        return redirect('/bills/index')->with('success', 'Update Successful');
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
        $customer = Bills::destroy($id);;
        return redirect('/bills/index')->with('success','Deletion Successful');
    }
}
