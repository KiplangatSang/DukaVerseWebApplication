<?php

namespace App\Repositories;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;


class RoutesRepository
{


    // routes to redirect on login
    public function userRedirectRoute()
    {
        $route = null;
        if (auth()->user()->is_admin) {
            $route = '/admin/home';
        } elseif (auth()->user()->role == 1) {

            $route = '/user/retail';
            # /user/home
        } elseif (auth()->user()->role == 2) {
            $route = '/user/suppliers';
        }

        return $route;
    }
}
