<?php

namespace App\Http\Controllers\Retails;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RetailOwnerController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }
    //

    public function index()
    {

     return view('Retailers.RetailOwner.index');
    }

public function create()
    {
        $retail = $this->getRetail();
        $retail->retail_goods = json_decode($retail->retail_goods);
        $profileComplete = $this->calculate_profile($retail);
        $retail['profile_complete'] = $profileComplete;

        return view('client.retailers.profile.userprofile.edit', compact('retail'));
    }

    public function store()
    {
        return redirect('retails/retailowner/index');
    }

    public function show($id)
    {
        return view('Retailers.RetailOwner.show');
    }

    public function update()
    {
        return view('Retailers.RetailOwner.update');
    }

    public function destroy()
    {
        return redirect('retails/retailowner/index');
    }
}
