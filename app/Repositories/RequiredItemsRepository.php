<?php

namespace App\Repositories;

class RequiredItemsRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    public function indexData()
    {
        # code...
        $requiredItems = $this->getAllRequiredItems();

        //dd($requiredItems);

        $stocksitems = count($requiredItems);
        $stocksrevenue = $requiredItems->sum('price');
        $allStocks = array(
            "Stocks"  => $requiredItems,
        );
        $requiredItemsData = array(
            'allStocks' =>  $allStocks,
            'stocksitems' => $stocksitems,
            'stocksrevenue' => $stocksrevenue,
        );

        return $requiredItemsData;
    }

    public function showData($id)
    {
        //
        $allStocks = $this->retail->stocks()->where('stockName', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

      return  $stocksdata;
    }

    public function getAllRequiredItems()
    {
        $requiredItems = $this->retail->requiredItems()->get();
        foreach ($requiredItems as $requiredItem) {
            $requiredItem['item'] = $requiredItem->items()->first();
        }
        return $requiredItems;
    }

    //get sale by item id
    public function getRequiredItemsById($itemid)
    {
        $requiredItem = $this->retail->requiredItems()->where('id', $itemid)->get();

        return $requiredItem;
    }

    //get employee sales
    public function getEmployeeRequiredItems($empid)
    {
        $requiredItem = $this->retail->requiredItems()->where('employees_id', $empid)->get();
        return $requiredItem;
    }

    //get employee sales
    public function getRequiredItemsByDate($startDate, $endDate)
    {
        $requiredItem = $this->retail->requiredItems()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $requiredItem;
    }


    public function getRequiredItemsCost()
    {
        $requiredItemPrice = $this->retail->requiredItems()->sum('price');
        # code...
        return $requiredItemPrice;
    }

    public function getRequiredItems($key, $value)
    {
        $requiredItem =  $this->retail->requiredItems()->where($key, $value)->orderBy('created_at', 'DESC')->get();
        //dd($sales);
        return $requiredItem;
    }

    public function storeRequiredItems($stock)
    {
        # code...
        $requiredResult =  $this->retail->requiredItems()->create([
            "employees_id" => auth()->id(),
            "retail_items_id" => $stock->retail_items_id,
            "required_amount" => 1,
            "projected_cost" => $stock->items()->first()->buying_price,
        ]);

        if (!$requiredResult)
            return false;
        return true;
    }
}
