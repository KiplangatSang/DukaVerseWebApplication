<?php

namespace App\Sales;

use App\Employees;
use App\Retails\Retail;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //

    protected $guarded = [];

  public function saleable(){
      return $this->morphTo();
  }

  public function retailsaleable(){
    return $this->morphTo();
}
}
