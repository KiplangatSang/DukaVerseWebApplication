<?php

namespace App\Http\Controllers\Sales;

use App\Http\Controllers\Controller;
use App\Retails\Retail;
use App\Sales\Sales ;
use Hamcrest\Core\HasToString;

class SalesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $user = auth()->user();
        //$retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->get();
        $retail = $user->Retails()->get();
        if(count($retail) < 1){
            return redirect('/retails/addretail')->with('message','Register Your Retail Shop First' );
        }


        $retails = auth()->user()->Retails()->get();

        $allSales = null;
        $salesitems = null;
        $salesrevenue = null;
        $meansales = null;

        foreach($retails as $retail){
           $retailName = $retail->retailName;
             $salesitems = count($retail->sales);
                $salesrevenue = $retail->sales->sum('price');
                $meansales = $retail->sales->Avg('itemAmount');
            $allSales = array(
               "Sales"  => $retail->sales,

            );
        }
        $salesdata = array(
            'allSales' =>  $allSales,
           'salesitems' => $salesitems,
           'salesrevenue' => $salesrevenue,
           'meansales' => $meansales,
           'retails' => $retails,
        );

         //dd( $salesdata);
        return view("Sales.showsolditems",compact('salesdata'));
    }


    public function getSalesByRetail($retailId){

        $retails = Retail::where('id',$retailId)->get();

        $allSales = null;
        $salesitems = null;
        $salesrevenue = null;
        $meansales = null;

        foreach($retails as $retail){
            $sales = $retail->sales;
           // dd($sales);
             $salesitems = count($sales);
                $salesrevenue = $sales->sum('price');
                $meansales = $sales->Avg('itemAmount');
            $allSales = array(
               "Sales"  => $sales,

            );
        }
        $salesdata = array(
            'allSales' =>  $allSales,
           'salesitems' => $salesitems,
           'salesrevenue' => $salesrevenue,
           'meansales' => $meansales,
           'retails' => $retails,
        );


         dd( $salesdata);
         return view("Sales.showsolditems",compact('salesdata'));
    }


    public function getSalesByDate(){
     request()->validate(
            ['startDate'=> 'required'
            ]
        );

        $to = now();
        if(request()->input('endDate') != null ){
            $to = request()->input('endDate')." 23:59:59";
            //dd($to);
        }


       // dd(now());
        $from = request()->input('startDate')." 00:00:00";
        dd($from);



        $retails = auth()->user()->Retails()->get();

        $allSales = null;
        $salesitems = null;
        $salesrevenue = null;
        $meansales = null;

        foreach($retails as $retail){
            $sales = Sales::whereBetween('created_at', [$from." 00:00:00",$to." 23:59:59"])->get();
           // dd($sales);
             $salesitems = count($sales);
                $salesrevenue = $sales->sum('price');
                $meansales = $sales->Avg('itemAmount');
            $allSales = array(
               "Sales"  => $sales,

            );
        }
        $salesdata = array(
            'allSales' =>  $allSales,
           'salesitems' => $salesitems,
           'salesrevenue' => $salesrevenue,
           'meansales' => $meansales,
           'retails' => $retails,
        );


         //dd( $salesdata);
         return view("Sales.showsolditems",compact('salesdata'));
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
        $allSales = Sales::where('itemName',$id)
                    ->orderBy('created_at', 'DESC')
                    ->get();
        $salesdata = array(
            'allSales' =>  $allSales,
        );

                   // dd($allSales);
        return view('Sales.showsaleitem',compact('salesdata'));
    }
    public function delete($sale_id){
        Sales::destroy($sale_id);

        return back()->with('success', 'Deletion Successful');

    }



}
