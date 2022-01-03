<?php

namespace App\Http\Controllers\TermsAndConditions;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Terms_and_conditionsController extends Controller
{
    //

    public function index(){
        request()->validate(
        [
            'terms_and_conditions' => 'required',
        ]
        );

        session('terms_and_conditions','checked');

        return redirect('/register');
    }
}
