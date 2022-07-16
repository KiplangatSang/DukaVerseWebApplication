<?php

namespace App\Http\Controllers\Admin\Locations;

use App\Http\Controllers\BaseController;
use App\Http\Controllers\Controller;
use App\Repositories\AppRepository;
use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;


class AdminLocationsController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      $latlon = $this->location();
        return view('location', compact('latlon'));
    }


}
