<?php

namespace App\Repositories;

class SuppliesRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    public function getAllSupplies()
    {
        $supplies = $this->retail->supplies()->get();
        return $supplies;
    }

    //get supplies by item id
    public function getSuppliesById( $itemid)
    {
        $supplies = $this->retail->supplies()->where('id',$itemid)->first();

        return $supplies;
    }


     public function getSuppliesByDate($startDate, $endDate)
     {
         $supplies = $this->retail->supplies()->whereBetween('created_at', [$startDate." 00:00:00",$endDate." 23:59:59"])->get();
         return $supplies;
     }


     public function getSuplyItemByKeys($key,$value)
     {
         $supplies =  $this->retail->supplies()->where($key,$value)->orderBy('created_at', 'DESC')->get();
      return $supplies;
     }



}
