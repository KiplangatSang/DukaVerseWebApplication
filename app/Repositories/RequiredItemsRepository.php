<?php

namespace App\Repositories;

class RequiredItemsRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }
    public function getDisctictRequiredItems()
    {
        $requiredItems = $this->retail->requiredItems()->distinct('itemName','itemSize')->get();
        foreach($requiredItems as $requiredItem){
            $requiredItem->itemAmount = $this->retail->requiredItems()->where('itemName', $requiredItem->itemName)->sum('itemAmount');
            $requiredItem->price = $this->retail->requiredItems()->where('itemName', $requiredItem->itemName)->sum('price');


        }
        return $requiredItems;
    }
    public function getAllRequiredItems()
    {
        $requiredItem = $this->retail->requiredItems()->get();
        return $requiredItem;
    }

    //get sale by item id
    public function getRequiredItemsById( $itemid)
    {
        $requiredItem = $this->retail->requiredItems()->where('sales_empid',$itemid)->get();

        return $requiredItem;
    }

    //get employee sales
    public function getEmployeeRequiredItems($empid)
    {
        $requiredItem = $this->retail->requiredItems()->where('employees_id',$empid)->get();

        return $requiredItem;
    }

     //get employee sales
     public function getRequiredItemsByDate($startDate, $endDate)
     {
         $requiredItem = $this->retail->requiredItems()->whereBetween('created_at', [$startDate." 00:00:00",$endDate." 23:59:59"])->get();
         return $requiredItem;
     }


     public function getRequiredItemsCost()
     {
        $requiredItemPrice = $this->retail->requiredItems()->sum('price');
         # code...
         return $requiredItemPrice ;
     }

     public function getRequiredItems($key,$value)
     {
         $requiredItem =  $this->retail->requiredItems()->where($key,$value)->orderBy('created_at', 'DESC')->get();
         //dd($sales);
      return $requiredItem;
     }



}
