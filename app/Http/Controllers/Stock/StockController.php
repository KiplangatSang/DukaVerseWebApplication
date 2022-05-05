<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\Controller;
use App\Stock\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
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
            $stocksitems = count($retail->stocks);
            $stocksrevenue = $retail->stocks->sum('price');
            $allStocks = array(
                "Stocks"  => $retail->stocks,

            );
        }
        $stocksdata = array(
            'allStocks' =>  $allStocks,
            'stocksitems' => $stocksitems,
            'stocksrevenue' => $stocksrevenue,
            'retails' => $retails,
        );

        //dd( $salesdata);
        return view("client.stock.ItemsInStore.showitemsinstore", compact('stocksdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('client.stock.itemsinstore.createitemsinstore');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $allStocks = Stock::where('stockName', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );


        return view('client.stock.ItemsInStore.showiteminstore', compact('stocksdata'));
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stock_id)
    {
        Stock::destroy($stock_id);

        return back()->with('success', 'Deletion Successful');
        //
    }

    //


    public function showRetailStock()
    {
        return view('client.stock.showitemsinstore');
    }

    public function createAStock()
    {
        return view('client.stock.createitemsinstore');
    }


    public function updateAStock()
    {
        return view('client.stock.showitemsinstore');
    }
}
