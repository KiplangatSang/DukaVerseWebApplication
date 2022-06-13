<?php

namespace App\Http\Controllers\Supplies;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\SuppliesRepository;
use App\Supplies\Supplies;
use Illuminate\Http\Request;

class SuppliesController extends BaseController
{
    private $stockrepo;
    private $retail;

     public function __construct()
     {
         $this->middleware('auth');
     }

    public function suppliesRepository()
    {
        # code...
        $this->retail = $this->getRetail();

        if (!$this->retail)
            return redirect('/home')->with('message', __('retail.create'));

        $this->requiredItemsRepo = new SuppliesRepository($this->retail);
        return  $this->requiredItemsRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $supplies = $this->suppliesRepository()->getAllSupplies();

        $suppliesdata['supplies'] = $supplies;

        return view("client.supplies.index",compact('suppliesdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("client.supplies.create");
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
        $this->suppliesRepository();
        $request->validate([

        ]);

        $this->retail->supplies()->create(
         $request->all(),
        );

        return redirect('/client/supplies/index')->with('success',__('supplies.create'));
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
        $supply = $this->suppliesRepository()->getSuppliesById($id);
        $suppliesdata['supply']=$supply;
        return view("client.supplies.show",compact('suppliesdata'));
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
        $supply = $this->suppliesRepository()->getSuppliesById($id);
        $suppliesdata['supply']=$supply;
        return view("client.supplies.edit",compact('suppliesdata'));
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
        $this->retail->supplies()->where('id',$id)->update(
            $request->all(),
           );

         return redirect('/client/supplies/show/'.$id)->with('success',__('supplies.update'));
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
        Supplies::destroy($id);
        return redirect('/client/supplies/index')->with('success',__('supplies.delete'));
    }
}
