<?php

namespace App\Http\Controllers\Customers;

use App\Customers\Customers;
use App\Http\Controllers\Controller;
use App\Retails\Retail;
use Exception;
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

       $customerlist = $retail->first()->customers;

      //$customerlist = Customers::all();

     // dd($customerlist);

        $customerdata = array(
            'customerlist' => $customerlist,
            'customercount' =>count($customerlist),
            'retails' =>$retail,
        );

        return view('client.customers.index',compact('customerdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $user = auth()->user();
        $retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->get();
        if(count($retail) < 1){
            return redirect('/retails/addretail')->with('message','Register Your Retail Shop First' );
        }
        $custdata = array(
            'Retail' => $retail
        );
        return view('client.customers.create',compact('custdata'));
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
        request()->validate(
            [
                'name' => 'required',
                'ID' => 'required',
                'phoneno' => 'required',
                'email' => ['email','required',],
                'address' => 'required',
                'retail_id' => 'required',

            ]
            );
            $retail = Retail::where('id',  $request->retail_id)->orderBy('created_at', 'DESC')->first();


           // dd($retail);

           try {
            $retail->customers()->create(
                [
                    'name' => $request->name,
                    'id_number' => $request->ID,
                    'phone_number'=>$request->phoneno,
                    'email' => $request->email,
                    'address' => $request->address,

                ]
            );

            return redirect('/customers/index')->with('success');


        } catch (Exception $ex) {

            $ex->getMessage();
            return back()->with('message',"Could not register Employee");
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
       // $retail = auth()->user()->Retails()->get();
       // $customerlist = $retail->customers->where('id',$id)->first();
        $customerlist = Customers::where('id',$id)->first();

        $customerdata = array(
            'customer' => $customerlist,
        );

        return view('client.customers.show',compact('customerdata'));
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


        $retails = auth()->user()->Retails()->get();
        $cust = Customers::where('id',$id)->first();

        //dd($cust);
        //$customerlist = $retail->first()->customers->where('id',$id)->first();
        $retail = $cust->retails()->first();
        //dd($retail);

        $custdata = array(
            'cust' => $cust,
            'custretail' => $retail,
            'retails' => $retails,
        );



        return view('client.customers.edit',compact('custdata'));
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
        $retail = Retail::where('id',  $request->retail_id)->orderBy('created_at', 'DESC')->first();

        try {


            $retail->customers()->updateOrCreate(
                [ 'email' => $request->email,
                 'id_number' => $request->ID,],
                [
                    'name' => $request->name,
                    'phone_number'=>$request->phoneno,
                    'address' => $request->address,
                ]
            );

            return redirect('/customers/index')->with('success');


        } catch (Exception $ex) {

            $ex->getMessage();
            return back()->with('message',"Could not register Employee");
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
        $customer = Customers::destroy($id);;
        return redirect('/customers/index')->with('success','Deletion Successful');
    }
}
