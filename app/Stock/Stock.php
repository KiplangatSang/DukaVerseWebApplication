<?php

namespace App\Stock;

use App\RequiredItems\RequiredItems;
use App\Retail\RetailItems;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $guarded=[];


public function stockable(){
    return $this->morphTo();
}

public function requiredItems(){
    return $this->hasMany(RequiredItems::class);
}

public function items(){
    return $this->belongsTo(RetailItems::class,'retail_items_id');
}

public function supplierstockable(){
    return $this->morphTo();
  }

}
