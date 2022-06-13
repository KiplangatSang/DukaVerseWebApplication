<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Retails\Retail;
use App\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class HomeController extends BaseController
{
    //
    public function __construct()
    {
          return $this->middleware('auth');
    }

    public function index()
    {   $retail = $this->getRetail();
        $retail['complete'] = $this->calculate_profile($retail);
        return view('home',compact('retail'));
    }

    public function retails()
    {
        $retails = $this->setRetail();

        if (count($retails['retails'])<1) {
            return redirect("/client/retails/create")->with('error', 'Register Your Retail Shop First');
        }
        return view('retails', compact('retails'));
    }

    //stores the chosen retail in database
    public function show(Request $request)
    {
        request()->validate([
            'retail' => 'required',

        ]);
        $retail = Retail::where('id', $request->retail)->first();
        //dd( $retail);
        $user =  User::where('id',auth()->id())->first();
        $user->sessionRetail()->updateOrCreate(
            [

                'id'=>1,
              ],
          [

              'retailNameId'=>$retail->retail_Id,
             'retail_id' =>$retail->id,]
        );
       // $request->session()->put('retail', $retail);
        // dd("retail:".session('retail'));
        return redirect('/user/home');
    }
}
