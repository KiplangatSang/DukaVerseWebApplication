<?php

namespace App\Retail;

use App\RequiredItems\RequiredItems;
use App\Sales\Sales;
use App\Stock\Stock;
use Illuminate\Database\Eloquent\Model;

class RetailItems extends Model
{
    //
    protected $guarded = [];

    public function itemable(){
        return $this->morphTo();
    }

    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    public function sales(){
        return $this->hasMany(Sales::class);
    }

    public function requiredItems(){
        return $this->hasMany(RequiredItems::class,'retail_items_id');
    }

}
