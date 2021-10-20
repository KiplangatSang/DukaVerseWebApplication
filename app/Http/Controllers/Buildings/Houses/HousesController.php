<?php

namespace App\Http\Controllers\Buildings\Houses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HousesController extends Controller
{

 public function Index(Type $var = null)
{
    return view('houses');
}


}
