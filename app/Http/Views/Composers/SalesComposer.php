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



    $salesData = array(28, 480, 40, 190, 860);

    $data = array(
       'retailimage'=> $retailimage ,
       'salesData'=> $salesData

    );



    $view ->with('data', $data);
}

}
