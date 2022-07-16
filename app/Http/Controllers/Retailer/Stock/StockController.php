<?php

namespace App\Http\Controllers\Retailer\Stock;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\ExpenseRepository;
use App\Repositories\RequiredItemsRepository;
use App\Repositories\StockRepository;
use App\RequiredItems\RequiredItems;
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
            return redirect('/home')->with('message', __('retail.select'));

        $this->stockrepo = new StockRepository($this->retail);

        return $this->stockrepo;
    }



    public function index()
    {

        $allStocks = $this->stockRepository()->getStock();
        $stocksitems = count($allStocks);
        $stocksexpense = $this->stockRepository()->getStockExpense();
        $stocksexpectedSales = $this->stockRepository()->getStockValue();
        $stocksrevenue = $stocksexpectedSales - $stocksexpense;


        $stockdata = array(
            'allStocks' =>  $allStocks,
            'stocksitems' => $stocksitems,
            'stocksexpense' => $stocksexpense,
            'stocksexpectedSales' => $stocksexpectedSales,
            'stocksrevenue' => $stocksrevenue,
        );
// dd($allStocks);

        return view("client.stock.store.index", compact('stocksdata'));
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
            "allStock"  =>  $this->stockRepository()->getStock(),

        );
        //dd( $stockdata);
        return view('client.stock.store.create', compact('stockdata'));
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
                "code" => ["required", "unique:stocks"],
                "name" => "required",
                "size" => "required",
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
            $fileNameToStore = $this->saveFile("stock_image", $request['stockImageFile']);
            if (!$fileNameToStore)
                return back()->with('error', "could not save item");

            $request['stockImage'] = $fileNameToStore;
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
    public function show($item_id)
    {


        $allStocks = $this->stockRepository()->getStockItems($item_id);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );


        return view('client.stock.store.show', compact('stocksdata'));
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
        $allStocks = $this->stockRepository()->getRetailItem($id);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        //dd($stocksdata);
        return view('client.stock.store.edit', compact('stocksdata'));
    }

    public function editItem($id)
    {
        //
        $allStocks = $this->stockRepository()->getStocksById($id);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        //dd($stocksdata);
        return view('client.stock.store.items.edit', compact('stocksdata'));
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
        $retail =  $this->getRetail();

        if ($request['image']) {
            $fileNameToStore = $this->saveFile("stock_image", $request['image']);

            if (!$fileNameToStore)
                return back()->with('error', "could not save item");
            $request = $request->except(['image', '_token']);
            $request['image'] = $fileNameToStore;
        } else {
            $request = $request->except(['_token']);
        }
        $retail->items()->where('id', $id)->update(
            $request,
        );
        return redirect('/client/stock/index')->with('success', ' Item updated successfully');
    }

    public function updateItem(Request $request, $id)
    {
        //

        $request->validate([
            'code' => 'required',
        ]);
        $retail =  $this->getRetail();



        $retail->stocks()->where('id', $id)->update(
            request()->except(['_token']),
        );
        return back()->with('success', ' Item updated successfully');
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


    public function markRequired($id)
    {

        $requiredResult =  $this->stockRepository()->markRequired($id);
        if (!$requiredResult)
            return back()->with('error', 'Could not mark this item as required');

        return back()->with('success', ' Item updated successfully');
    }

    public function orderItems($id)
    {
        return redirect('')->with('success', 'Edit Your orders here');
    }
}
