<?php

namespace App\Http\Controllers\Admin\Bills;

use App\Bills\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Customers\Customers;
use App\User;
use Exception;
use Illuminate\Support\Facades\Session;

class AdminBillController extends Controller
{
     //
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
        //
        //$retail = auth()->user()->Retails()->get();

       // $billslist = $retail->bills;
       $user = User::whereIn( 'id',auth()->user())->first();


        $billslist = $user->bills()->get();


        //dd($billslist);
        $billsdata = array(
            'billslist' => $billslist,
        );

        return view('Admin.Bills.index',compact('billsdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Admin.Bills.create');
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
        $user = User::whereIn( 'id',auth()->user())->first();
        $user->bills()->create(
            ['billName'=> $request->billName,
            'billDescription'=> $request->billDescription,
            'billAmount'=> $request->billAmount,
            'billPaymentStatus'=> $request->billPaymentStatus,
            'billPaymentDuration' => $request->billPaymentDuration
            ]
        );

        return redirect('/admin/bills/index');
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
        // $payment = array(
        //     'payAmount' => $bill->billAmount,
        //     'payDescription' => $bill->billName,
        // );
        // Session::put(
        //         'payment' ,$payment

        // );
        $billdata = array();
        $billdata['bill'] = $bill;

        return view('Admin.Bills.show',compact('billdata'));
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
       // $retail = auth()->user()->Retails()->get();
        // $billslist = Bills::where('id',$id)->first();

        // $billsdata = array(
        //     'customer' => $billslist,
        // );
        $bill = Bills::where('id',$id)->first();
        $billdata = array();
        $billdata['bill'] = $bill;

        return view('Admin.Bills.edit',compact('billdata'));
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
        $user = User::whereIn( 'id',auth()->user())->first();
        Bills::where('id',$id)->update(
            ['billName'=> $request->billName,
            'billDescription'=> $request->billDescription,
            'billAmount'=> $request->billAmount,
            'billPaymentStatus'=> $request->billPaymentStatus,
            'billPaymentDuration' => $request->billPaymentDuration
        ]

        );
        return redirect('/admin/bills/index')->with('success', 'Update Successful');
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
        return redirect('/admin/bills/index')->with('success','Deletion Successful');
    }
}
