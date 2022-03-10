<?php

namespace App\Http\Views\Composers;

use App\Retails\Retail;
use Illuminate\View\View;

class SalesComposer
{

public function compose(View $view){
    $user = auth()->user();
    $retailimage = Retail::whereIn('retailable_id' , $user)->orderBy('created_at', 'DESC')->get(['retailName','retailPicture',]);
    //return $retailimage;


    if($retailimage = []){
        $retailimage = array(
            'retailPicture' => 'noprofile.png',
            'retailName' => 'unregistered retail'
        );

       ;
    }


    $usersData = array(28, 480, 40, 190, 860);
    $loansData = array(400, 100, 700, 800, 400);
    $salesData = array(60, 300, 600, 10, 50);
    $creditData = array(28, 480, 40, 190, 860);
    $revenueData = array( 480, 28, 860,40, 190);



    $data = array(
       'retailimage'=> $retailimage ,
       'usersData'=> $usersData,
       'loansData'=> $loansData,
       'salesData'=> $salesData,
       'creditData'=> $creditData,
       'revenueData'=> $revenueData,

    );



    $view ->with('data', $data);
}

}
