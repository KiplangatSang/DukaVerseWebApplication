<?php

namespace App\Retails;

use App\Employees;
use App\Sales\Sales;
use App\Stock\Stock;
use App\Supplies\Orders;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    //

    protected $guarded =[];

    public function retailable()
    {

        return $this->morphTo(User::class);

    }



    public function sales(){
        return $this->morphMany(\App\Sales\Sales::class,'retailsaleable');
    }

    public function stocks(){
        return $this->morphMany(Stock::class,'retailstockable');
    }


    public function Retails(){

        return  $this->hasMany(Retails::class);
    }

    public function Employees(){

            return $this->morphMany(Employees::class,'employeeable');

    }

    public function orders(){
        return $this->morphToMany(Orders::class,'orderable');
}




}
