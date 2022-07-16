<?php

namespace App\Http\Controllers\Retailer;

use App\Http\Controllers\Controller;
use App\Mail\NotifyMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendEmailController extends Controller
{
    //
    public function index()
    {
        # code...
        // Mail::to('kiplangatsang425@gmail.com')->send(new NotifyMail());
        $to_name = 'kiplangatsang425@gmail.com';
        $to_email = 'kiplangatsang425@gmail.com';
        $data = array('name'=>"Sam Jose", "body" => "Test mail");

       $result = Mail::send('emails.demomail', $data, function($message) use ($to_name, $to_email) {
            $message->to($to_email, $to_name)
                    ->subject('Artisans Web Testing Mail');
            $message->from('ksblogger254@gmail.com','Artisans Web');
        });

        return $result;
        if (Mail::failures()) {
             return response()->Fail('Sorry! Please try again latter');
        }else{
             return response()->success('Great! Successfully send in your mail');
           }
    }
}
