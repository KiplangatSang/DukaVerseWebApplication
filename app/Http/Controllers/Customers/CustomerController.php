<?php

namespace App\Http\Controllers\Customers;

use App\Customers\Customers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $retail = auth()->user()->Retails()->get();
        if(count($retail) < 1){
            return redirect('/retails/addretail')->with('message','Register Your Retail Shop First' );
        }

      //  $customerlist = $retail->customers;

      $customerlist = Customers::all();

        $customerdata = array(
            'customerlist' => $customerlist,
            'customercount' =>count($customerlist),
            'retails' =>$retail,
        );

        return view('Customers.index',compact('customerdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Customers.create');
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
        return redirect('/customers/index');
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
       // $retail = auth()->user()->Retails()->get();
       // $customerlist = $retail->customers->where('id',$id)->first();
        $customerlist = Customers::where('id',$id)->first();

        $customerdata = array(
            'customer' => $customerlist,
        );

        return view('Customers.show',compact('customerdata'));
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

        $retail = auth()->user()->Retails()->get();
        $customerlist = $retail->customers->where('id',$id)->first();

        $customerdata = array(
            'customer' => $customerlist,
        );


        return view('Customers.edit',compact('customerdata'));
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
        return redirect('/customers/index');
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
        $customer = Customers::destroy($id);;
        return redirect('/customers/index')->with('success','Deletion Successful');
    }
}
