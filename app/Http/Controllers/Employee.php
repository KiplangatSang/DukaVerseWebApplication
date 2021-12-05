<?php

namespace App\Http\Controllers;

use App\Sales\Sales;
use Illuminate\Http\Request;

class Employee extends Controller
{
    //Emp with Sales
    public function sales(){

         return $this->hasMany(Sales::class);

    }



}
