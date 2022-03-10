<?php

namespace App\Http\Controllers\Admin\Supplies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminSupplyController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        //
         $retail = auth()->user()->Retails()->get();
         //$supplierslist = $retail->suppliers->where('id',$id)->first();

        $supplierslist = Suppliers::all();

       // dd($supplierslist);

        $suppliersdata = array(
            'supplierslist' => $supplierslist,
            'retails' => $retail,
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

        $retail = auth()->user()->Retails()->where('id', $request->retail_id)->first();
        $retail->suppliers()->create(
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


        $retail = auth()->user()->Retails()->get();
        $retail->suppliers->updateOrCreate(
            ['email' => $request->email, 'name' => $request->name],
            ['phone_number' => $request->name, 'address' => $request->address, 'phone_number' => $request->phone_number,]
        );


        return redirect('/supplies/suppliers/show/'.$id);
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
