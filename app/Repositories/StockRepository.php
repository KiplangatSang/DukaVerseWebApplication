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

        $this->retail->stocks()->create(
            $request->except('stockImageFile'),
        );

        //save expense
        $expense = $request->buying_price;
        //save through expense repository
        $expenseRepo = new ExpenseRepository($this->retail);
        $expenseResult = $expenseRepo->saveExpense($expense);
        if (!$expenseResult)
            return false;
        return true;
    }

    public function getDisctictStock()
    {
        $stocks = $this->retail->stocks()->distinct('stockName', 'stockSize')->get();
        foreach ($stocks as $stock) {
            $stock->itemAmount = $this->retail->sales()->where('itemName', $stock->stockName)->sum('itemAmount');
            $stock->price = $this->retail->sales()->where('itemName', $stock->stockName)->sum('price');
        }
        return $stocks;
    }

    public function getAllStock($key = null, $value = null)
    {
        $stock = null;
        if ($key && $value) {
            $stock = $this->retail->stocks()->where($key, $value)->get();
        } else
            $stock = $this->retail->stocks()->get();;

        return $stock;
    }

    //get sale by item id
    public function getStockById($itemid)
    {
        $stock = $this->retail->stocks()->where('stockNameId', $itemid)->first();

        return $stock;
    }

    //get employee sales

    //get employee sales
    public function getStockByDate($startDate, $endDate)
    {
        $sale = $this->retail->stocks()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $sale;
    }


    public function getRevenue()
    {


        $projectedsales = $this->retail->sales()->sum('selling_price');
        $stockexpense = $this->retail->stocks()->sum('buying_price');
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
}
