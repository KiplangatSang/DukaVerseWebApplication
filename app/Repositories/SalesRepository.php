<?php

namespace App\Repositories;

use App\Stock\Stock;

class SalesRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    //store sales item
    public function saveSalesItem($request)
    {
        $this->retail->sales()->create(
            $request,
        );
    }

    public function getDisctictSoldItems()
    {
        //dd($this->retail);
        $sales = $this->retail->sales()->distinct('itemName', 'itemSize')->get();
        foreach ($sales as $sale) {
            $sale->itemAmount = $this->retail->sales()->where('itemName', $sale->itemName)->sum('itemAmount');
            $sale->price = $this->retail->sales()->where('itemName', $sale->itemName)->sum('price');
        }
        return $sales;
    }

    //get all sales
    public function getAllSales($month = null, $year = null)
    {
        $sales = null;

        if (!$year)
            $year = date('Y');
        if ($month)
            $sales = $this->retail->sales()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();

        else {
            $month = date('m');
            $sales = $this->retail->sales()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        }


        return $sales;
    }

    //getSoldItems
    public function getSoldItems($month = null, $year = null)
    {
        $sales = $this->getAllSales($month, $year);

        return count($sales);
    }

    //get sale by item id
    public function getSuppliesById($itemid)
    {
        $sale = $this->retail->supplies()->where('id', $itemid)->get();

        return $sale;
    }

    //get supplies sales
    public function getSupplierSupplies($id)
    {
        $sale = $this->retail->supplies()->where('supplier_id', $id)->get();

        return $sale;
    }

    //get employee sales
    public function getSalesByDate($startDate, $endDate)
    {
        $sale = $this->retail->sales()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $sale;
    }


    public function getRevenue($key = null, $value = null)
    {
        $sales = 0;
        $salesexpense = 0;
        if ($key && $value) {
            $sales = $this->retail->sales()
                ->where($key, $value)
                ->sum('price');
            $salesexpense = $this->retail->stocks()
                ->where($key, $value)
                ->sum('buying_price');
        } else {
            $sales = $this->retail->sales()->sum('price');
            $salesexpense = $this->retail->stocks()->sum('buying_price');
        }


        $salesrevenue = $sales - $salesexpense;
        # code...
        return $salesrevenue;
    }
    public function getProfitPercentage($key = null, $value = null)
    {
        $salesrevenue = $this->getRevenue($key, $value);
        if (!$salesrevenue)
            return 0;
        $salesTotalPrice = $this->getAllSales($key, $value)->sum('price');
        if (!$salesTotalPrice)
            return 0;
        $percentageProfit = ($salesrevenue / $salesTotalPrice) * 100;

        return $percentageProfit;
    }


    public function getSaleItem($key, $value)
    {
        $sales =  $this->retail->sales()->where($key, $value)->orderBy('created_at', 'DESC')->get();
        return $sales;
    }
    //get sale by item id
    public function getStockById($itemid)
    {
        $stock = $this->retail->stocks()->where('stockNameId', $itemid)->first();

        return $stock;
    }

    public function getMonthlySales($month =  null, $year = null)
    {

        if (!$year)
            $year = date('Y');
        $transactions = null;
        if ($month)
            $transactions = $this->retail->salesTransactions()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        else
            $transactions = $this->retail->salesTransactions()
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', $year)
                ->get();
        return $transactions;
    }

    public function getSalesGrowth($key = null, $value =  null)
    {
        $month = date('m');

        $currentTransactions = $this->retail->salesTransactions()
            ->whereMonth('created_at', '=', $month)
            ->sum('price');

        $previousTransactions = $this->retail->salesTransactions()
            ->whereMonth('created_at', '=', $month - 1)
            ->sum('price');

        if (!$currentTransactions)
            $currentTransactions = 1;

        if (!$previousTransactions)
            $previousTransactions = 1;

        $growth = (($currentTransactions -  $previousTransactions) / $currentTransactions) * 100;

        $growth = number_format($growth, 2);
        return $growth;
    }

    //remove item from stock once sold


    public function removeStockItem($id)
    {
        # code...
        $stockRepo = new StockRepository($this->retail);
        $result = $stockRepo->removeStockItem($id);
        if (!$result)
            return false;
        return true;
    }

    //add sold item from stock
    public function addSoldItemFromStock($id)
    {
        # code...
        $stockRepo = new StockRepository($this->retail);
        $stockItem = $stockRepo->getStockById($id);
        if (!$stockItem)
            return false;

     $saleitem = array(
                'itemNameId' => $stockItem->
                'itemName' => $stockItem->
                'description' => $stockItem->
                'itemAmount' => $stockItem->
                'itemImage' =>$stockItem->
                'price' => $stockItem->
     )


}


    //$month = "2027";
        // $post = Mjblog::whereYear('created_at', '=', $year)
        //     ->whereMonth('created_at', '=', $month)
        //     ->get();
        //5636642.0
