<?php

namespace App\Http\Controllers\Retailer\Stock;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\RequiredItemsRepository;
use App\Repositories\StockRepository;
use Illuminate\Http\Request;

class StockAPIController  extends BaseController
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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $this->stockRepository();

        $allStocks = $this->stockRepository()->getStock();
        $stocksitems = count($allStocks);
        $stocksexpense = $this->stockRepository()->getStockExpense();
        $stocksexpectedSales = $this->stockRepository()->getStockValue();
        $stocksrevenue = $stocksexpectedSales - $stocksexpense;


        $stocksdata = array(
            'allStocks' =>  $allStocks,
            'stocksitems' => $stocksitems,
            'stocksexpense' => $stocksexpense,
            'stocksexpectedSales' => $stocksexpectedSales,
            'stocksrevenue' => $stocksrevenue,
        );

        if (!$stocksdata)
            return $this->sendError('error', "Could not process request");

        return $this->sendResponse($stocksdata, "Stock items in your store");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $this->stockRepository();
        $stockdata = array(
            "allStock"  =>  $this->stockRepository()->getStock(),

        );


        if (!$stockdata)
            return $this->sendError('error', "Could not process request");

        return $this->sendResponse($stockdata, "Enter data to store a new Stock");
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
            return $this->sendError('error', "Could not Save Expense");

        return $this->sendResponse($result, "Enter data to be updated");
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
        if (!$stocksdata)
            return $this->sendError("Error", "Could not get the item");

        return $this->sendResponse($stocksdata, "Stock Item Found");
    }

    public function showItem($id)
    {
        //
        $allStocks = $this->stockRepository()->getStocksById($id);
        if (!$allStocks)
            return $this->sendError("Error", "Could not get the item");
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        return $this->sendResponse($stocksdata, "Item found in store");
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

        if (!$stocksdata)
            return $this->sendError("Error", "Could not get the item");

        return $this->sendResponse($stocksdata, "Enter data to be updated");
    }

    public function editItem($id)
    {
        //
        $allStocks = $this->stockRepository()->getStocksById($id);
        if (!$allStocks)
            return $this->sendError("Error", "Could not get the item");
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        return $this->sendResponse($stocksdata, "Enter data to be updated");
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

        $stocksdata = $retail->items()->where('id', $id)->update(
            request()->except(['_token']),
        );

        if (!$stocksdata)
            return $this->sendError("Error", "Update could not be made");

        return $this->show($id);
    }

    public function updateItem(Request $request, $id)
    {
        //

        $request->validate([
            'code' => 'required',
        ]);
        $retail =  $this->getRetail();



        $result =  $retail->stocks()->where('id', $id)->update(
            request()->except(['_token']),
        );
        if (!$result)
            return $this->sendError("Error", "Update could not be made");
        return $this->showItem($id);
    }

    public function destroy($stock_id)
    {
        $result = $this->stockRepository()->removeStockItem($stock_id);
        if (!$result)
            return $this->sendError('error', 'Could not delete this item');
        //

        return $this->sendResponse('success', 'The item was deleted Successfully');
    }
    public function markRequired($id)
    {

        $requiredResult=  $this->stockRepository()->markRequired($id);
        if (!$requiredResult)
            return $this->sendError('error', 'Could mark this item as required',401);

        return $this->sendResponse($requiredResult, ' Item updated successfully');
    }
}
