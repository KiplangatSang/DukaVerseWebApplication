<?php

namespace App\RequiredItems;

use App\Employees\Employees;
use App\Retail\RetailItems;
use App\Supplies\Orders;
use Illuminate\Database\Eloquent\Model;

class RequiredItems extends Model
{
    //

    protected $guarded =[];

    public function requiredable(){
        return $this->morphTo();
      }

      public function items(){
        return $this->belongsTo(RetailItems::class,'retail_items_id');
    }

    public function employees()
    {
        return $this->belongsTo(Employees::class,'employees_id');
    }

    public function orders()
    {
        return $this->belongsTo(Orders::class,'orders_id');
    }
}
