<?php

namespace App\Repositories;

use App\Stock\Stock;

class StockRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    public function saveStock($request)
    {

        // dd($request->all());

        $item = $this->retail->items()->updateOrCreate(
            [
                'name' => $request->name,
                'brand' => $request->brand,
                'size'  => $request->size,
                'selling_price' => $request->selling_price,
            ],
            [
                'image' => $request->stockImage,
                'buying_price' => $request->buying_price,
            ]
        );

        if (!$item)
            return false;
        //
        // dd($item);
        // $retailItem =  $this->retail->items()->whereIn('id', $item)->first();
        // dd( $retailItem->id);

       $item= $this->retail->stocks()->updateOrCreate(
            [
                'code' => $request->code,
            ],
            [
                'retail_items_id' => $item->id,
            ]

        );

        $item['item'] =  $item->items()->first();

        $expense = $request->buying_price;
        //save through expense repository
        $expenseRepo = new ExpenseRepository($this->retail);
        $expenseResult = $expenseRepo->saveExpense($expense);
        if (!$expenseResult)
            return false;
        return  $item;
    }

    public function getDisctictStock()
    {
        $stocks = $this->retail->stocks()->get();

        return $stocks;
    }

    public function getAllStock($key = null, $value = null)
    {
        $stocks = null;
        if ($key && $value) {
            $stocks = $this->retail->stocks()->where($key, $value)->with('items')
            ->get();
        } else
            $stocks = $this->retail->stocks()
            ->with('items')
            ->get();

            //dd($stocks);
        foreach ($stocks as $stock) {
            $stock['item'] =  $stock->items()->first();
        }
        return $stocks;
    }

    // public function getItems($key = null, $value = null)
    // {
    //     $stocks = null;
    //     if ($key && $value) {
    //         $stocks = $this->retail->stocks()->where($key, $value)->get();
    //     } else
    //         $stocks = $this->retail->stocks()->get();

    //     foreach ($stocks as $stock) {
    //         $stock['item'] =  $stock->items()->first();
    //     }
    //     return $stocks;
    // }

    //get items
    public function getStock()
    {
        # code...
        $stockItems = $this->retail->items()->get();
        foreach ($stockItems as $stockItem) {
            $stockItem['item'] = $stockItem->stocks()->get();
        }
        // dd($stockItems);
        return $stockItems;
    }

    //get stock items
    public function getStockItems($items_id)
    {
        $item = $this->retail->items()
            ->with('stocks')
            ->where('id', $items_id)
            ->first();
            return $item;
        // $stockItems = $item->stocks()
        //     ->whereIn('stockable_id', $this->retail)
        //     ->get();
        // $stockItems['retail_item'] = $item;
        // return $stockItems;
    }

    public function getRetailItem($items_id)
    {
        $item = $this->retail->items()
            ->where('id', $items_id)
            ->first();


        return $item;
    }

    //get stock value
    public function getStockValue()
    {
        # code...
        $stockValue = 0;
        $stocks = $this->retail->stocks()->get();
        foreach ($stocks as $stock) {
            $item = $stock->items()->first();
            if ($item)
                $stockValue += $item->selling_price;
        }

        return $stockValue;
    }

    //get stock value
    public function getStockExpense()
    {
        # code...
        $stockExpense = 0;
        $stocks = $this->retail->stocks()->get();
        //dd($stocks);
        foreach ($stocks as $stock) {
            $item = $stock->items()->first();
            if ($item)
                $stockExpense += $item->buying_price;
        }

        return $stockExpense;
    }


    //get sale by item id
    public function getStocksById($id)
    {
        $stock = $this->retail->stocks()->where('id', $id)->first();
        if (!$stock)
            return false;
        $stock['item'] =  $stock->items()->first();

        return $stock;
    }

    //get sale by item code
    public function getStockById($code)
    {
        $stock = $this->retail->stocks()->where('code', $code)->first();
        $stock['item'] =  $stock->items()->first();

        return $stock;
    }



    public function getRevenue()
    {


        $projectedsales = $this->retail->items()->sum('selling_price');
        $stockexpense = $this->retail->items()->sum('buying_price');
        $projectedRevenue = $projectedsales - $stockexpense;

        return $projectedRevenue;
    }

    public function getSaleItem($key, $value)
    {
        $sales =  $this->retail->sales()->where($key, $value)->orderBy('created_at', 'DESC')->get();
        //dd($sales);
        return $sales;
    }

    public function removeStockItem($id)
    {
        $result = Stock::destroy($id);
        if (!$result)
            return false;
        return true;
    }

    public function markRequired($id)
    {

        $stock = $this->retail->stocks()->where('id', $id)->first();

        if (!$stock)
            return false;
        $stockUpdate = $stock->update(
            [
                "isRequired" => true,
            ]
        );
        $requiredRepo = new RequiredItemsRepository($this->retail);

        $requiredResult =  $requiredRepo->storeRequiredItems($stock);
        $stockData["stockUpdate"] = $stockUpdate;

        if (!$requiredResult)
            return false;

        $stockData["requiredResult"] = $stockUpdate;
        return $stockData;
    }
}
