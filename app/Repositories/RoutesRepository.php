<?php

namespace App\Repositories;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;


class RoutesRepository
{


      // routes to redirect on login
    public function userRedirectRoute(){
         $route = null ;
       if(auth()->user()->isEmployee){
         $route ='/admin/home';
       } else{
        $route ='/user/home';
       }

     return $route;
    }


}
