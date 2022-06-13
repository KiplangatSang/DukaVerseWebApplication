<?php

namespace App\Employees;

use App\Sales\Sales;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $guarded=[];


    public function Roles(){
      return $this->morphMany(Roles::class,'roleable');
    }

    public  function employeeable(){

        return $this->morphTo();
    }

    public function sales(){
        return $this->hasMany(Sales::class);
      }
}
