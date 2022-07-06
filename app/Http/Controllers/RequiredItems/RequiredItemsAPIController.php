<?php

namespace App\Http\Controllers\RequiredItems;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequiredItemsAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $stocksdata = $requiredItems = $this->requiredItemsRepsitory()->indexData();

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
                'requiredItemId' => 'required',
                'requiredItem' => 'required',
                'employees_id' => 'required',
                'stock_id' => 'required',
                'requiredAmount' => 'required',
                'projectedCost' => 'required',
                'requiredStatus' => 'required',

            ]
        );

        $this->retail->requiredItems()->create(
            $request->all(),
        );
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
        $stocksdata =$this->requiredItemsRepsitory()->showData($id);

        return  $stocksdata;
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
    }
}
