<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class Sales extends Controller
{
    //Sales with Employee

    public function employees()
    {
        return $this->belongsTo(Employees::class);
    }
}
