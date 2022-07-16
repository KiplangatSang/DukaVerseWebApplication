<?php

namespace App\Http\Controllers\Retailer\Customers;

use App\Customers\Customers;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\CustomersRepository;
use App\Retails\Retail;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Stripe\Customer;

class CustomerController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $ordersRepo;
    private $retail;

    public function __construct()
    {
        $this->middleware('auth');

    }
    public function customersRepository()
    {
        # code...

        $this->retail = $this->getRetail();

        $this->ordersRepo = new CustomersRepository($this->retail);
        return $this->ordersRepo;
    }

    public function index()
    {
        $this->customersRepository();
        if (!$this->retail)
            return redirect('/home');


        $customerlist =  $this->retail->customers()->get();

        $customerlist = Customers::all();

        // dd($customerlist);

        $customerdata = array(
            'customerlist' => $customerlist,
            'customercount' => count($customerlist)
        );

        return view('client.customers.index', compact('customerdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->customersRepository();
        if (!$this->retail)
            return redirect('/home');
        //
        $user = auth()->user();
        $custdata = array(
            'retail' => $this->retail,
        );
        return view('client.customers.create', compact('custdata'));
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
        $this->customersRepository();

        request()->validate(
            [
                'name' => 'required',
                'ID' => 'required',
                'phoneno' => 'required',
            ]
        );
        $retail = Retail::where('id',  $request->retail_id)->orderBy('created_at', 'DESC')->first();


        // dd($retail);

        try {
            $retail->customers()->create(
                [
                    'name' => $request->name,
                    'id_number' => $request->ID,
                    'phone_number' => $request->phoneno,
                    'email' => $request->email,
                    'address' => $request->address,

                ]
            );

            return redirect('/customers/index')->with('success');
        } catch (Exception $ex) {

            $ex->getMessage();
            return back()->with('message', "Could not register Employee");
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
        $this->customersRepository();
        if (!$this->retail)
            return redirect('/home');

         $customer = $this->retail->customers()->where('id',$id)->first();
         $custCredit = $customer->credits()->get();

        $customerdata = array(
            'customer' => $customer,
            'custCredit' => $custCredit,
        );

        return view('client.customers.show', compact('customerdata'));
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
        $this->customersRepository();
        if (!$this->retail)
            return redirect('/home');

            dd(Customers::all());
       $cust = $this->retail->customers()->where('id', $id)->first();


        $retail = $cust->customerable()->first();

        $custdata = array(
            'cust' => $cust,
            'custretail' => $retail,
        );



        return view('client.customers.edit', compact('custdata'));
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
        $this->customersRepository();
        //
        $cust = $this->retail->customers()->where("id", $id)->first();

        try {
            $cust->update(
                $request->all(),
            );

            return redirect('/customers/index')->with('success');
        } catch (Exception $ex) {

            $ex->getMessage();
            return back()->with('message', "Could not Update Customer");
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
        $this->customersRepository();
        if (!$this->retail)
            return redirect('/home');
        //
        $customer = Customers::destroy($id);;
        return redirect('/customers/index')->with('success', 'Deletion Successful');
    }
}
