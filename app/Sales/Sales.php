<?php

namespace App\Sales;

use App\Employees;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    //

    protected $guarded = [];

  public function saleable(){
      return $this->morphTo(Employees::class);
  }
}
