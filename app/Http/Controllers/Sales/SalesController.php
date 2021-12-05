<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Sales\Sales;
use Illuminate\Http\Request;

class SalesController extends Controller
{

    public function index($RetailId){
        $allSales = Sales::where('retailid',$RetailId)
                    ->orderBy('createdAt')->DESC
                    ->get();

        return view("sales.showsolditems",compact('allSales'));
    }


    public function create(){

    $saleitem = request()->validate(
        ['itemNameId'=> 'required',
        'itemName' => 'required',
        'itemSize' => 'required',
       'itemAmount' => 'required',
      'price'=>'required'
        ]
    );

    $salesdata = Sales::upsert(
        ['itemNameId' => request()->input('itemNameId'), 'name' => request()->input('itemName')],
        ['itemSize' => request()->input('itemSize'),'itemAmount' =>  request()->input('itemAmount'),'price' =>  request()->input('price')]
    );

    return view("sales.createsolditems",compact('salesdata'));
    }

    public function showCreateSales(){
       // $allSales = Sales::All();
        return view("sales.createsolditems");
    }

    public function showAll(){
        //$allSales = Sales::All();
        return view('sales.showsolditems');
    }


    public function showPaidSoldItems(){
        // $allSales = Sales::where('status','paid')
        //             ->orderBy('createdAt')->DESC
        //             ->get();
         return view('sales.showpaidsolditems');
    }
    public function showSoldItemsOnCredit(){
        // $allSales = Sales::where('status','paid')
        //             ->orderBy('createdAt')->DESC
        //             ->get();
         return view('sales.showsolditemsoncredit');
    }
    public function show(){
        // $allSales = Sales::where('retailid',$RetailId)
        //             ->orderBy('createdAt')->DESC
        //             ->get();
        return view('sales.showsolditems');
    }
    public function delete($RetailId){
        $allSales = Sales::where('retailid',$RetailId)
                    ->orderBy('createdAt')->DESC
                    ->get();
    }



}
