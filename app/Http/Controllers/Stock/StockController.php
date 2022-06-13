<?php

namespace App\Http\Controllers\Stock;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\ExpenseRepository;
use App\Repositories\StockRepository;
use App\Stock\Stock;
use Illuminate\Http\Request;

class StockController extends BaseController
{
    private $stockrepo;
    private $retail;

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function stockRepository()
    {
        # code...
        $this->retail = $this->getRetail();
        // dd($this->retail);
        if (!$this->retail)
            return redirect('/retails/addretail')->with('message', __('retail.create'));

        $this->stockrepo = new StockRepository($this->retail);

        return $this->stockrepo;
    }



    public function index()
    {
        $this->stockRepository();

        $allStocks = $this->retail->stocks()->get();
        $stocksitems = count($allStocks);
        $stocksexpense = $this->retail->stocks()->sum('buying_price');
        $stocksexpectedSales = $this->retail->stocks()->sum('selling_price');
        $stocksrevenue = $stocksexpectedSales - $stocksexpense;


        $stocksdata = array(
            'allStocks' =>  $allStocks,
            'stocksitems' => $stocksitems,
            'stocksexpense' => $stocksexpense,
            'stocksexpectedSales' => $stocksexpectedSales,
            'stocksrevenue' => $stocksrevenue,
        );

        //dd( $salesdata);
        return view("client.stock.ItemsInStore.index", compact('stocksdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $this->stockRepository();
        $stockdata = array(
            "allStock"  => $this->retail->stocks()->orderBy('created_at', 'DESC')->get(),

        );
        //dd( $stockdata);
        return view('client.stock.itemsinstore.create', compact('stockdata'));
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
                "stockNameId" => ["required", "unique:stocks"],
                "stockName" => "required",
                "stockSize" => "required",
                "stockAmount" => "required",
                "brand" => "required",
                "selling_price" => "required",
                "buying_price" => "required",
            ]

        );

        //check if both image has been uploaded and previous image has been reused
        if ($request->hasFile('stockImageFile') && $request['stockImageUrl']) {
            $request->request->remove('stockImageUrl');
        }

        if ($request->has('stockImageUrl')) {
            $request['stockImage'] = $request['stockImageUrl'];
            unset($request['stockImageUrl']);
        } else {
            $request->validate(
                [
                    "stockImageFile" => ["required", "file:max 3000"],
                ]
            );
            $request['stockImage'] = $request['stockImageFile'];
            unset($request['stockImageFile']);
        }


        $request->validate(
            [
                "stockImage" => ["required",],
            ]

        );

        //save through sock repository
        $stockRepo = $this->stockRepository();
        $result = $stockRepo->saveStock($request);

        if (!$result)
            return back()->with('error', "Could not Save Expense");


        return back()->with('success', "Stock item and Expense added");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->stockRepository();

        $allStocks = $this->retail->stocks()
            ->where('stockName', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );


        return view('client.stock.ItemsInStore.show', compact('stocksdata'));
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
        $result = $this->stockRepository()->removeStockItem($stock_id);
        if (!$result)
            return back()->with('error', 'Could not delete this item');
        //
        return back()->with('success', 'The item was deleted Successfully');
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
