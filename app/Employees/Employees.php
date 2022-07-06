<?php

namespace App\Employees;

use App\RequiredItems\RequiredItems;
use App\Sales\Sales;
use App\User;
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

      public function requiredItems(){
        return $this->hasMany(RequiredItems::class);
      }
      public function user(){
        return $this->belongsTo(User::class);
      }
}

