<?php

namespace App\Repositories;

use App\Retails\Retail;
use App\Sales;
use App\Sales\Sales as SalesSales;
use App\User;

class SalesRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }

    public function getAllSales()
    {
        $sales = $this->retail->sales()->get();
        return $sales;
    }

    //get sale by item id
    public function getSalesById( $itemid)
    {
        $sale = $this->retail->saleable()->where('sales_empid',$itemid)->get();

        return $sale;
    }

    //get employee sales
    public function getEmployeeSales($empid)
    {
        $sale = $this->retail->saleable()->where('sales_empid',$empid)->get();

        return $sale;
    }

     //get employee sales
     public function getSalesByDate($startDate, $endDate)
     {
         $sale = $this->retail->saleable()->whereBetween('created_at', [$startDate." 00:00:00",$endDate." 23:59:59"])->get();
         return $sale;
     }


     public function getRevenue()
     {
        $salesrevenue = $this->retail->sales()->sum('price');
         # code...
         return $salesrevenue ;
     }

     public function getSaleItem($key,$value)
     {
      return  $this->retail->sales()->orderBy('created_at', 'DESC')->where($key,$value);
     }



}
