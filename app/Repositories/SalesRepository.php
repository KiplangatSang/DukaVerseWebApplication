<?php

namespace App\Repositories;

use App\Stock\Stock;

class SalesRepository
{
    private $account;
    public function __construct($account)
    {
        $this->account = $account;
    }


    public function indexData()
    {
        # code...
        $allSales = $this->getAllSales();
        $soldItems = $this->getItems();
        //dd( $soldItems);

        $solditemscount = count($allSales);
        $salesTotalPrice = $allSales->sum('selling_price');
        $salesrevenue = $this->getRevenue();
        $meansales = $this->account->sales()->get()->Avg('selling_price');
        $meansales = round($meansales, 2);
        $growth = $this->getProfitPercentage();
        $growth = round($growth, 2);


        $salesdata = array(
            'soldItems' => $soldItems,
            'allSales' =>  $allSales,
            'solditemscount' => $solditemscount,
            'salesTotalPrice' => $salesTotalPrice,
            'salesrevenue' => $salesrevenue,
            'meansales' => $meansales,
            'growth' => $growth,
        );

        return $salesdata;
    }

    public function createData()
    {
        # code...
        $stockdata = array(
            "allStock"  => $this->account->stocks()->get(),

        );

        return  $stockdata;
    }

    public function showData($id)
    {
        # code...
        $allSales = $this->getSaleItem($id);
        // dd( $allSales);
        $salesdata = array(
            'allSales' =>  $allSales,
        );

        return  $salesdata;
    }

    public function destroy($id)
    {
        //
        $result = $this->account->sales()->destroy($id);
        if (!$result)
            return false;
        return $result;
    }

    //store sales item
    public function saveSalesItem($request)
    {
        $this->account->sales()->create(
            $request,
        );
    }

    public function saveSalesItemFromStock($request)
    {
        // dd($request);
        $result = $this->account->sales()->create(
            [
                'code' => $request->code,
                'selling_price' => $request->item->selling_price,
                'employees_id' => auth()->id(),
                'retail_items_id' => $request->retail_items_id,
                'sale_transaction_id' => $request->sale_transaction_id,
            ]

        );

        if (!$result)
            return false;

        return true;
    }
    public function getDisctictSoldItems()
    {
        $sales = $this->account->sales()->distinct('itemName', 'itemSize')->get();
        foreach ($sales as $sale) {
            $sale->itemAmount = $this->account->sales()->where('itemName', $sale->itemName)->sum('itemAmount');
            $sale->price = $this->account->sales()->where('itemName', $sale->itemName)->sum('selling_price');
        }

        return $sales;
    }

    //get sold items
    public function getItems($month = null, $year = null)
    {
        $sales = null;

        if (!$year)
            $year = date('Y');
        if ($month)
            $items = $this->account->items()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();

        else {
            $month = date('m');
            $items = $this->account->items()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        }
        foreach ($items as $item) {
            $item['sales'] =  $item->sales()->whereIn('retailsaleable_id', $this->account)->get();
        }

        return $items;
    }

    //get all sales
    public function getAllSales($month = null, $year = null)
    {
        $sales = null;

        if (!$year)
            $year = date('Y');
        if ($month)
            $sales = $this->account->sales()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();

        else {
            $month = date('m');
            $sales = $this->account->sales()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        }
        foreach ($sales as $sale) {
            $sale['item'] =  $sale->items()->first();
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
        $sale = $this->account->supplies()->where('id', $itemid)->get();

        return $sale;
    }

    //get supplies sales
    public function getSupplierSupplies($id)
    {
        $sale = $this->account->supplies()->where('supplier_id', $id)->get();

        return $sale;
    }

    //get employee sales
    public function getSalesByDate($startDate, $endDate)
    {
        $sale = $this->account->sales()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $sale;
    }


    public function getRevenue($key = null, $value = null)
    {
        $salesRevenue = 0;
        $salesexpense = 0;

        $sales = $this->account->sales()
            ->where($key, $value)
            ->sum('selling_price');

        $stockRepo = new StockRepository($this->account);
        $salesexpense = $stockRepo->getStockExpense();

        $salesRevenue = $sales - $salesexpense;
        # code...
        return $salesRevenue;
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


    public function getSaleItem($item_id)
    {
        $item = $this->account->items()->where('id', $item_id)->first();

        $sales =  $item->sales()
            ->whereIn('retailsaleable_id', $this->account)
            ->orderBy('created_at', 'DESC')->get();

        foreach ($sales as $sale)
            $sale['item'] = $item;
        return $sales;
    }
    //get sale by item id
    public function getStockById($itemid)
    {
        $stock = $this->account->stocks()->where('code', $itemid)->first();
        $stock['item'] =  $stock->items()->first();
        return $stock;
    }

    public function getMonthlySales($month =  null, $year = null)
    {
        if (!$year)
            $year = date('Y');
        $transactions = null;
        if ($month)
            $transactions = $this->account->salesTransactions()
                ->whereMonth('created_at', '=', $month)
                ->whereYear('created_at', '=', $year)
                ->get();
        else
            $transactions = $this->account->salesTransactions()
                ->whereMonth('created_at', '=', date('m'))
                ->whereYear('created_at', '=', $year)
                ->get();

        //dd($transactions);
        return $transactions;
    }

    public function getSalesGrowth($key = null, $value =  null)
    {
        $month = date('m');

        $currentTransactions = $this->account->salesTransactions()
            ->whereMonth('created_at', '=', $month)
            ->sum('paid_amount');

        $previousTransactions = $this->account->salesTransactions()
            ->whereMonth('created_at', '=', $month - 1)
            ->sum('paid_amount');

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
        $stockRepo = new StockRepository($this->account);
        $result = $stockRepo->removeStockItem($id);
        if (!$result)
            return false;
        return true;
    }

    //add sold item from stock
    public function addSoldItemFromStock($item, $transId)
    {
        # code...
        $stockRepo = new StockRepository($this->account);

        $salesItem = $item;

        $salesItem['sale_transaction_id'] = $transId;
        $saveSales = $this->saveSalesItemFromStock($salesItem);
        if (!$saveSales)
            return false;

        $result = $this->removeStockItem($item->id);
        return $result;
    }

    public function getTransactionItems($transaction)
    {
        # code...
        $sales = $transaction->sales()->get();
        if (!$sales)
            return false;
        foreach ($sales as $sale) {
            $items =  $sale->items()->first();
            $sale['item'] = $items;
        }

        return $sales;
    }

    public function getPaidSoldItems()
    {
        # code...
        $transactions = $this->account->salesTransactions()->where('pay_status', true)->get();
        foreach ($transactions as $transaction) {
            $sales = $this->getTransactionItems($transaction);;
            $transaction['sales'] = $sales;
        }
        return $transactions;
    }

    public function getCreditItems()
    {
        # code...

        $transactions = $this->account->salesTransactions()->where('on_credit', true)->get();
        foreach ($transactions as $transaction) {
            $sales = $this->getTransactionItems($transaction);
            $transaction['sales'] = $sales;
        }
        return $transactions;
    }


    //employees
    public function getEmployeeSales($id)
    {
        $emp = $this->account->employees()->where('id', $id)->first();
        $sales = $emp->sales()->get();
        foreach ($sales as $sale) {
            $sale['saleitem'] = $sale->items()->first();
            // dd($sale);
        }
        $sales['emp'] = $emp;

        //dd($sales);
        return  $sales;
    }
}
