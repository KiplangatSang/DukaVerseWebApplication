<?php

namespace App\Retails;

use App\Employees;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Retail extends Model
{
    //

    protected $guarded =[];

    public function retailable()
    {

        return $this->morphTo(User::class);

    }

    public function Retails(){

        return  $this->hasMany(Retails::class);
    }

    public function Employees(){

            return $this->morphMany(Employees::class,'employeeable');

    }



}
