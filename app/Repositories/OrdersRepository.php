<?php

namespace App\Repositories;

class OrdersRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
    }
    public function getDisctictRequiredItems()
    {
        $orders = $this->retail->orders()->distinct('itemName','itemSize')->get();
        foreach($orders as $order){
            $order->itemAmount = $this->retail->orders()->where('itemName', $order->itemName)->sum('itemAmount');
            $order->price = $this->retail->orders()->where('itemName', $order->itemName)->sum('price');


        }
        return $orders;
    }
    public function getAllorders()
    {
        $order = $this->retail->orders()->get();
        return $order;
    }

    //get sale by item id
    public function getOrdersById( $itemid)
    {
        $order = $this->retail->orders()->where('sales_empid',$itemid)->get();

        return $order;
    }

    //get employee sales
    public function getEmployeeOrders($empid)
    {
        $order = $this->retail->orders()->where('employees_id',$empid)->get();

        return $order;
    }

     //get employee sales
     public function getordersByDate($startDate, $endDate)
     {
         $order = $this->retail->orders()->whereBetween('created_at', [$startDate." 00:00:00",$endDate." 23:59:59"])->get();
         return $order;
     }


     public function getordersCost()
     {
        $ordersPrice = $this->retail->orders()->sum('price');
         # code...
         return $ordersPrice ;
     }

     public function getOrders($key,$value)
     {
         $sales =  $this->retail->orders()->where($key,$value)->orderBy('created_at', 'DESC')->get();
         //dd($sales);
      return $sales;
     }



}
