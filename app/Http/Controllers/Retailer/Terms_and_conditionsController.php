<?php

namespace App\Http\Controllers\Retailer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Terms_and_conditionsController extends Controller
{
    //

    public function index(Request $request){
        request()->validate(
        [
            'terms_and_conditions' => 'required',
        ]
        );

        dd($request->all());

        session('terms_and_conditions','checked');

        return redirect('/register');
    }
}
