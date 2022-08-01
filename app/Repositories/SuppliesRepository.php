<?php

namespace App\Repositories;

class SuppliesRepository
{
    private $account;
    public function __construct($account)
    {
        $this->account = $account;
    }

    public function getAllSupplies()
    {
        $supplies = $this->account->supplies()->get();
        return $supplies;
    }

    //get supplies by item id
    public function getSuppliesById( $itemid)
    {
        $supplies = $this->account->supplies()->where('id',$itemid)->first();

        return $supplies;
    }


     public function getSuppliesByDate($startDate, $endDate)
     {
         $supplies = $this->account->supplies()->whereBetween('created_at', [$startDate." 00:00:00",$endDate." 23:59:59"])->get();
         return $supplies;
     }


     public function getSuplyItemByKeys($key,$value)
     {
         $supplies =  $this->account->supplies()->where($key,$value)->orderBy('created_at', 'DESC')->get();
      return $supplies;
     }



}
