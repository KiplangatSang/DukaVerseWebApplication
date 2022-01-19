<?php

namespace App\Http\Controllers\Retails;

use App\Http\Controllers\Controller;
use App\Retails\Retail;
use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RetailsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    //
public function create(Request $request){
 $data = request()->validate(
[    'retailName'=>'required',
     'retailGoods'=>['required',],
     'retailTown'=>['required',],
     'retailConstituency'=>['required',],
     'retailCounty'=>['required',],
     'retailPicture'=>['required','image',],
     'retailEmployees_number'=>['required','integer'],
     'retailStockEstimate'=>['required','integer'],
     ]


 );

 $fileNameToStore ="";
 if(request()->hasFile('retailPicture')){
     $jobDescFileWithExt= request() ->file('retailPicture')->getClientOriginalName();
     $filename = pathinfo($jobDescFileWithExt,PATHINFO_FILENAME);
     $extension = request()-> file('retailPicture')->getClientOriginalExtension();
     $fileNameToStore = $filename.'_'.time().'.'.$extension;
     $path = request()->file('retailPicture')->storeAs('public/RetailPictures',$fileNameToStore);


 }else{

     $fileNameToStore = 'nofile.pdf';
 }


$retail = new Retail();

 $retail-> retailNameId = substr($data['retailCounty'],0,3). rand(10000,100000);
 $retail-> retailName = $data['retailName'];
 $retail-> retailGoods = $data['retailGoods'];
 $retail-> retailTown = $data['retailTown'];
 $retail-> retailConstituency = $data['retailConstituency'];
 $retail-> retailCounty = $data['retailCounty'];
 $retail-> retailPicture =  $fileNameToStore;
 $retail-> retailEmployees_number = $data['retailEmployees_number'];
 $retail-> retailStockEstimate = $data['retailStockEstimate'];



auth()->user()->Retails()->create([
    'retailNameId' => $retail-> retailNameId,
   'retailCounty' =>$retail-> retailNameId,
   'retailName' =>$retail-> retailName,
   'retailGoods'=>$retail-> retailGoods ,
   'retailTown'=>$retail-> retailTown,
   'retailConstituency'=>$retail-> retailConstituency,
   'retailCounty'=>$retail-> retailCounty,
   'retailPicture' => $retail-> retailPicture,
   'retailEmployees_number'=>$retail-> retailEmployees_number,
   'retailStockEstimate'=>$retail-> retailStockEstimate,
]
);



 return redirect('/home');

}


}
