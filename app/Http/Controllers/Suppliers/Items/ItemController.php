<?php

namespace App\Http\Controllers\Suppliers\Items;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\ExpenseRepository;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;

class ItemController extends BaseController
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

    public function stockRepository()
    {
        $this->stockrepo = new StockRepository($this->user());
        return $this->stockrepo;
    }

    public function index()
    {
        //
        $this->stockRepository();

        $items = $this->stockRepository()->getStock();
        $stocksitems = count($items);
        $stocksexpense = $this->stockRepository()->getStockExpense();
        $stocksexpectedSales = $this->stockRepository()->getStockValue();
        $stocksrevenue = $stocksexpectedSales - $stocksexpense;


        $stockdata = array(
            'allStock' =>  $items,
            "stockitems" => $stocksitems,
            "stockexpense" => $stocksexpense,
            "stockexpectedSales" => $stocksexpectedSales,
            "stockrevenue" => $stocksrevenue,
        );
        // dd($allStocks);

        return view("supplier.items.index", compact('stockdata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $items = $this->user()->items()
            ->with('stocks')
            ->get();
        $stockdata = array(
            'allStock' =>  $items,
        );
        return view("supplier.items.create", compact('stockdata'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
    public function show($id)
    {
        //
        $allStocks = $this->stockRepository()->getStockItems($id);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );


        return view('supplier.items.show', compact('stocksdata'));
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
        return view('supplier.items.edit', compact('stocksdata'));
    }
    public function editItem($id)
    {
        //
        $allStocks = $this->stockRepository()->getStocksById($id);
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        //dd($stocksdata);
        return view('supplier.items.stockitems.edit', compact('stocksdata'));
    }

    public function update(Request $request, $id)
    {
        //

        if ($request['image']) {
            $fileNameToStore = $this->saveFile("stock_image", $request['image']);

            if (!$fileNameToStore)
                return back()->with('error', "could not save item");
            $request = $request->except(['image', '_token']);
            $request['image'] = $fileNameToStore;
        } else {
            $request = $request->except(['_token']);
        }
        $this->user()->items()->where('id', $id)->update(
            $request,
        );
        return redirect('/supplier/stock/index')->with('success', ' Item updated successfully');
    }

    public function updateItem(Request $request, $id)
    {
        //

        $request->validate([
            'code' => 'required',
        ]);
        $this->user()->stocks()->where('id', $id)->update(
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
    public function destroy($id)
    {
        //
    }
}
