<?php

namespace App\Repositories;

use Exception;
use Illuminate\Support\Facades\Log;

class CustomersRepository
{
    private $retail;
    public function __construct($retail)
    {
        $this->retail = $retail;
        // try{
        //     $this->retail->retailOwner()->get();
        // }catch(Exception $e){
        //  Log::info($e->getMessage());
        // }
    }
    public function getDisctictCustomers()
    {
        $customers = $this->retail->orders()->distinct('email')->get();

        return $customers;
    }
    public function getAllCustomers()
    {
        $customers = $this->retail->customers()->get();
        return $customers;
    }

    //get sale by item id
    public function getCustomerById( $id)
    {
        $customer = $this->retail->customers()->where('id',$id)->get();

        return $customer;
    }

    //get employee sales
    public function getCustomersCredit($id)
    {
        $order = $this->retail->customers()->where('id',$id)->get('credit');
        return $order;
    }

     //get employee sales
     public function getCustomersByDate($startDate, $endDate)
     {
         $order = $this->retail->customers()->whereBetween('created_at', [$startDate." 00:00:00",$endDate." 23:59:59"])->get();
         return $order;
     }


     public function getCustomersCost()
     {
        $creditPrice = $this->retail->customers()->sum('creditPrice');
         # code...
         return $creditPrice ;
     }

     public function getCustomers($key,$value)
     {
         $customers =  $this->retail->customers()->where($key,$value)->orderBy('created_at', 'DESC')->get();
         //dd($sales);
      return $customers;
     }



}
