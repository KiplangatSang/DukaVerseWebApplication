<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\RetailRepository;
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
    {
        $retail = $this->getRetail();
        $retail['complete'] = $this->calculate_profile($retail);
        return view('client.home', compact('retail'));
    }

    public function retails()
    {
        $retails = $this->getRetailList();

        if (count($retails['retails']) < 1)
            return redirect("/client/retails/create")->with('error', 'Register Your Retail Shop First');

        if (count($retails['retails']) == 1) {

            $retail_id = $retails['retails'][0]->id;
            $retailRepo = new RetailRepository(auth()->user());
            $retailRepo->storeRetailInSession($retail_id);
            return redirect('/user/home');
        } else {
            return view('retails', compact('retails'));
        }
    }

    //stores the chosen retail in database
    public function show(Request $request)
    {
        request()->validate([
            'retail' => 'required',

        ]);


        $retailRepo = new RetailRepository(auth()->user());
        $retailRepo->storeRetailInSession($request->retail);
        return redirect('/user/home');
    }

    public function suppliers()
    {
        # code...
        $retail = $this->getRetail();
        $retail['complete'] = $this->calculate_profile($retail);
        return view('supplier.home', compact('retail'));
    }

    
}
