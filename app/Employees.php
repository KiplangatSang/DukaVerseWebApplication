<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    //
    protected $guarded=[];


    public function Roles(){
       $this->morphMany(Roles::class,'roleable');
    }

    public  function employeeable(){

        return $this->morphTo(Retail::class);
    }
}
