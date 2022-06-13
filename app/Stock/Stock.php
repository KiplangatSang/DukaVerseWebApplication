<?php

namespace App\Stock;

use App\RequiredItems\RequiredItems;
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
public function supplierstockable(){
    return $this->morphTo();
  }

}
