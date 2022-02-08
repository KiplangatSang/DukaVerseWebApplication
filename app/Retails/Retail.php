<?php

namespace App\Retails;

use App\Bills\Bills;
use App\Customers\Customers;
use App\Employees;
use App\Sales\Sales;
use App\Stock\Stock;
use App\Supplies\Orders;
use App\Supplies\Supplies;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    //

    protected $guarded =[];

    public function retailable()
    {

        return $this->morphTo();

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

public function retailOwner(){
    return $this->morphToMany(RetailOwner::class,'retailownerable');
}

public function bills(){
    return $this->morphToMany(Bills::class,'billable');
}

public function customers(){
    return $this->morphToMany(Customers::class,'customerable');
}


public function supplies(){
    return $this->morphMany(Supplies::class,'supplyable');
}



}
