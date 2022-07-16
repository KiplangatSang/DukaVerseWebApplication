<?php

namespace App\Http\Controllers\Admin\Supplies;

use App\Http\Controllers\Controller;
use App\Supplies\Suppliers;
use App\Supplies\Supplies;
use Illuminate\Http\Request;

class AdminSupplierController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
        $supplierslist = Suppliers::all();
        $suppliersdata = array(
            'supplierslist' => $supplierslist,
        );

        return view('Supplies.Suppliers.index', compact('suppliersdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Supplies.Suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      Suppliers::create(
            [
                'email' => $request->email,
                'name' => $request->name,
                'phone_number' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
            ]

        );
        return redirect('/supplies/suppliers/index', compact('suppliersdata'));
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
        //  $retail = auth()->user()->Retails()->get();
        // $supplierslist = $retail->suppliers->where('id',$id)->first();
        $supplierslist = Suppliers::where('id', $id)->first();
        $suppliersdata = array(
            'supplierslist' => $supplierslist,
        );

        return view('Supplies.Suppliers.show', compact('suppliersdata'));
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
        //$supplierslist = $retail->suppliers->where('id',$id)->first();
        $supplierslist = Suppliers::where('id', $id)->first();
        $suppliersdata = array(
            'supplierslist' => $supplierslist,
        );

        return view('Supplies.Suppliers.edit', compact('suppliersdata'));
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


       Suppliers::updateOrCreate(
            ['email' => $request->email, 'name' => $request->name],
            ['phone_number' => $request->name, 'address' => $request->address, 'phone_number' => $request->phone_number,]
        );


        return redirect('/supplies/suppliers/show/' . $id);
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
        $customer = Suppliers::destroy($id);;
        return redirect('/supplies/suppliers/index')->with('success', 'Deletion Successful');
    }
}
