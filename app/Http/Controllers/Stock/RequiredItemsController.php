<?php

namespace App\Http\Controllers\stock;

use App\Http\Controllers\Controller;
use App\Stock\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class RequiredItemsController extends Controller
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
        $user = auth()->user();
        //$retail = Retail::whereIn('retailable_id',  $user)->orderBy('created_at', 'DESC')->get();
        $retail = $user->Retails()->get();
        if (count($retail) < 1) {
            return redirect('/retails/addretail')->with('message', 'Register Your Retail Shop First');
        }


        $retails = auth()->user()->Retails()->get();

        $allStocks = null;
        $stocksitems = null;
        $stocksrevenue = null;

        foreach ($retails as $retail) {
            $retailName = $retail->retailName;
            $requiredItems = $retail->stocks->where('isRequired', true);
            $stocksitems = count($requiredItems);
            $stocksrevenue = $retail->stocks->where('isRequired', true)->sum('price');
            $allStocks = array(
                "Stocks"  => $requiredItems,

            );
        }
        $stocksdata = array(
            'allStocks' =>  $allStocks,
            'stocksitems' => $stocksitems,
            'stocksrevenue' => $stocksrevenue,
            'retails' => $retails,
        );

        //dd( $salesdata);

        return view('client.stock.requireditems.showrequiredstock', compact('stocksdata'));
    }




    public function getDaysBetweenTwoDates()
    {
        $date1 = "2016-07-31";
        $date2 = "2016-08-05";

        $date1_ts = strtotime($date1);
        $date2_ts = strtotime($date2);
        $diff = $date2_ts - $date1_ts;
        return round($diff / 86400);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('client.stock.requireditems.createRequiredItem');
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
        $allStocks = Stock::where('stockName', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );


        return view('client.stock.requireditems.showrequireditem', compact('stocksdata'));
        //
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

    public function order(Request $request)
    {
        $requiredItems = array();
        $requestValues = array_values($request->input());

        //dd($request->input());
        $countStart = 1;

        if($request->has('sampleTable_length')){
            $countStart = 2;
        }

        for ($i = $countStart; $i < count($request->all()); $i++) {

            $requireditem = Stock::where('id', $requestValues[$i])->first();

           $requiredItems[$requireditem->id] = $requireditem;
           // $requiredItems = array_merge($requiredItems,$data);

        }
        if (empty($requiredItems)) {
            return back()->with('message', "You have not selected any item");
        }

        //dd($requiredItems);

        $allStocks = $requiredItems;

        Session::put('requiredItems', $requiredItems);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );
        return view('client.stock.requireditems.orderrequiredstock', compact('stocksdata'));
        //dd($requiredItems);
    }

    public function editRequiredItems( $id)
    {
        $requiredItems = session()->get('requiredItems');

        try {
            //code...


            $requiredItems = \array_diff_key($requiredItems, [$id => "xy"]);



        } catch (\Throwable $th) {
            throw $th;
            return back()->with('message','No item selected');
        }
        Session::put('requiredItems', $requiredItems);
        $allStocks = $requiredItems;
        //dd($allStocks);


        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        return view('client.stock.requireditems.orderrequiredstock', compact('stocksdata'));
        //dd($requiredItems);
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
