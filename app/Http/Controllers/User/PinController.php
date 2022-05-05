<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;

class PinController extends BaseController
{
    //
public function __construct()
{
$this->middleware('auth');
}

 public function makePin(Request $request)
{
    # code...
    $request->validate([
        'userpin' => ['required','digits_between:4,6','integer']
    ]);

    if(auth()->user()->update([
        'userpin' => $request->userpin,
    ])){
        $success['user'] =  auth()->user();
        return $this->sendResponse($success, 'User registered successfully.');
    }else{
        return $this->sendError('Server Error.', $this->errors());
    }
}
public function updatePin(Request $request)
{
    # code...
    $request->validate([
        'previouspin' => ['required','integer'],
        'newpin' => ['required','digits_between:4,6','integer'],
    ]);



    if(auth()->user()->userpin == $request->previouspin){

        auth()->user()->update([
            'userpin' => $request->newpin,
        ]);


        $success['user'] =  auth()->user();
        return $this->sendResponse($success, 'User registered successfully.');
    }else{
        return $this->sendError('Server Error.', "The old pin is not correct");
    }
}

}
