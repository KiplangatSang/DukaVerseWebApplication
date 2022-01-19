<?php

namespace App\Http\Controllers;

use App\Retails\Retail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PHPUnit\Util\Json;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function showRetailImage(){




    }

    public function index()
    {
       // $userEmail = Auth::user()->name;
        //dd($userEmail);
       //$user= User::where('email',$userEmail)->get();
        //dd($user)
        //,compact('user')

        // {{$salesData['0']}}

        $user = auth()->user();
        $retailimage = Retail::whereIn('retailable_id' , $user)->orderBy('created_at', 'DESC')->get(['retailName','retailPicture',]);
        //return $retailimage;

        if($retailimage = []){
            $retailimage = array(
                'retailPicture' => 'noprofile.png',
                'retailName' => 'unregistered retail'
            );
        }

        $salesData = array(28, 480, 40, 190, 860);

        $data = array(
           'retailimage'=> $retailimage ,
           'salesData'=> $salesData

        );
        return view('home', compact('data'));
    }
}
