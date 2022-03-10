<?php

namespace App\Http\Controllers\Admin\Bills;

use App\Bills\Bills;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminBillsHistoryController extends Controller
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

          $billslist = Bills::all();


          //dd($billslist);
          $billsdata = array(
              'billslist' => $billslist,
          );

          return view('Admin.Bills.History.index',compact('billsdata'));
      }

      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          //
          return view('Admin.Bills.History.create');
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
          return redirect('/admin/bills/history/index');
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
          return view('Admin.Bills.History.show');
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
          $billslist = Bills::where('id',$id)->first();

          $billsdata = array(
              'customer' => $billslist,
          );

          return view('Admin.Bills.History.edit',compact('billsdata'));
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
          return redirect('/admin/bills/history/index')->with('success', 'Update Successful');
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
          return redirect('/admin/billshistory/index')->with('success','Deletion Successful');
      }
}
