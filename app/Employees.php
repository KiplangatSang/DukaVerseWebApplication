<?php

namespace App;

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

        return $this->morphTo(Retail::class);
    }

    public function Sales(){
        return $this->morphMany(Sales::class,'saleable');
      }
}
