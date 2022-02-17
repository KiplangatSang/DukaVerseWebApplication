<?php

namespace App\Stock;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{

    protected $guarded=[];


  public function stockable(){
    return $this->morphTo();
}

public function retailstockable(){
  return $this->morphTo();
}

public function supplierstockable(){
    return $this->morphTo();
  }

}
