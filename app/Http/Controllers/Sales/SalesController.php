<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Sales;
use Hamcrest\Core\HasToString;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $allSales = Sales::all();
        $salesitems = Sales::count();
        $salesrevenue = Sales::sum('price');
        $meansales = Sales::Avg('itemAmount');

        $salesdata = array(
            'allSales' =>  $allSales,
           'salesitems' => $salesitems,
           'salesrevenue' => $salesrevenue,
           'meansales' => $meansales
        );
         //dd( $salesdata);
        return view("Sales.showsolditems") -> with( 'salesdata',$salesdata);
    }


    public function getSalesByDate(){
     request()->validate(
            ['startDate'=> 'required'
            ]
        );

        $allSales = Sales:: where('created_at','>',request()->input('startdate'))->get();

        $salesitems = count(Sales::where('created_at','>',request()->input('startdate'))->get());
        $salesrevenue = Sales::sum('price');
        $meansales = Sales::Avg('itemAmount');

        $salesdata = array(
            'allSales' =>  $allSales,
           'salesitems' => $salesitems,
           'salesrevenue' => $salesrevenue,
           'meansales' => $meansales
        );
         //dd( $salesdata);
        return view("Sales.showsolditems") -> with( 'salesdata',$salesdata);

    }


    public function create(){
     request()->validate(
        ['itemNameId'=> 'required',
        'itemName' => 'required',
        'description' => 'required',
       'itemAmount' => 'required',
       'itemImage' => ['required','image'],
      'price'=>'required'
        ]
    );

    Sales::upsert(
        ['itemNameId' => request()->input('itemNameId'), 'name' => request()->input('itemName')],
        ['itemSize' => request()->input('itemSize'),'itemAmount' =>  request()->input('itemAmount'),'price' =>  request()->input('price')]
    );

    return redirect("/showallsales");
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
        $allSales = Sales::where('itemAmount','150')
                    ->orderBy('created_at','DESC')
                    ->get();

                    $salesitems = Sales::count();
                    $salesrevenue = Sales::sum('price');
                    $meansales = Sales::Avg('itemAmount');

                    $salesdata = array(
                        'allSales' =>  $allSales,
                       'salesitems' => $salesitems,
                       'salesrevenue' => $salesrevenue,
                       'meansales' => $meansales
                    );
         return view('sales.showpaidsolditems',compact('salesdata'));
    }
    public function showSoldItemsOnCredit(){
        $allSales = Sales::where('itemAmount','150')
        ->orderBy('created_at','DESC')
        ->get();

        $salesitems = Sales::count();
        $salesrevenue = Sales::sum('price');
        $meansales = Sales::Avg('itemAmount');

        $salesdata = array(
            'allSales' =>  $allSales,
           'salesitems' => $salesitems,
           'salesrevenue' => $salesrevenue,
           'meansales' => $meansales
        );
         return view('sales.showsolditemsoncredit',compact('salesdata'));
    }
    public function show($id){
        $allSales = Sales::where('id',$id)
                    ->orderBy('created_at', 'DESC')
                    ->get();

                   // dd($allSales);
        return view('sales.showsinglesaleitem',compact('allSales'));
    }
    public function delete($id){
        $allSales = Sales::where('id',$id)
                    ->orderBy('createdAt')->DESC
                    ->get();
    }



}
