<?php

namespace App\Repositories;

use App\Sales;
use App\Sales\Sales as SalesSales;
use App\User;

class SalesRepository
{

    public function getAllSales(){

    }
    public function getSalesById(User $user,$salesid){
   $sale = SalesSales::where('id',$salesid)
   ->where('retail_id',$user->retail_id)
   ->where('retailOwnerId',$user->retailOwnerId)
   ->findOrFail()
   ->format();

   return $sale;
    }


}
