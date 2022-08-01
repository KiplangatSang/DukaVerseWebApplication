<?php

namespace App\Repositories;

class RequiredItemsRepository
{
    private $account;
    public function __construct($account)
    {
        $this->account = $account;
    }

    public function indexData()
    {
        # code...
        $requiredItems = $this->getAllRequiredItems();

        //dd($requiredItems);

        $requireditems = count($requiredItems);
        $ordereditems = count($requiredItems->where("is_ordered", true));
        $requireditemscost = $requiredItems->sum('price');
        $pendingitems = count($requiredItems->where("is_ordered", false));
        $allStocks = array(
            "Stocks"  => $requiredItems,
        );
        $requiredItemsData = array(
            'allStocks' =>  $allStocks,
            'requireditems' => $requireditems,
            'requireditemscost' => $requireditemscost,
            'ordereditems' => $ordereditems,
            'pendingitems' => $pendingitems,
        );

        return $requiredItemsData;
    }

    public function showData($id)
    {
        //
        $allStocks = $this->account->stocks()->where('stockName', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $stocksdata = array(
            'allStocks' =>  $allStocks,
        );

        return  $stocksdata;
    }

    public function getAllRequiredItems()
    {
        $requiredItems = $this->account->requiredItems()->get();
        foreach ($requiredItems as $requiredItem) {
            $requiredItem['item'] = $requiredItem->items()->first();
        }
        return $requiredItems;
    }

    //get sale by item id
    public function getRequiredItemsById($itemid)
    {
        $requiredItem = $this->account->requiredItems()->where('id', $itemid)->get();

        return $requiredItem;
    }

    public function updateRequiredItems($request)
    {
        # code...
        $result =   $this->account->requiredItems()->update(
            $request,
        );

        if (!$result)
            return false;
        return $result;
    }

    //get employee sales
    public function getEmployeeRequiredItems($empid)
    {
        $requiredItem = $this->account->requiredItems()->where('employees_id', $empid)->get();
        return $requiredItem;
    }

    //get employee sales
    public function getRequiredItemsByDate($startDate, $endDate)
    {
        $requiredItem = $this->account->requiredItems()->whereBetween('created_at', [$startDate . " 00:00:00", $endDate . " 23:59:59"])->get();
        return $requiredItem;
    }


    public function getRequiredItemsCost()
    {
        $requiredItemPrice = $this->account->requiredItems()->sum('price');
        # code...
        return $requiredItemPrice;
    }

    public function getRequiredItems($key, $value)
    {
        $requiredItem =  $this->account->requiredItems()->where($key, $value)->orderBy('created_at', 'DESC')->get();
        //dd($sales);
        return $requiredItem;
    }

    public function storeRequiredItems($item, $amount = null)
    {
        # code...
        if (!$amount)
            $amount = 1;
        $requiredResult =  $this->account->requiredItems()->create([
            "employees_id" => auth()->id(),
            "retail_items_id" => $item->id,
            "required_amount" => $amount,
            "projected_cost" => $item->selling_price,
        ]);

        if (!$requiredResult)
            return false;
        return true;
    }
}
