<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Supplies\OrderItems;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(OrderItems::class, function (Faker $faker) {
    return [

        'itemId'=> Str::random(10),
        'itemName'=>$faker->name ,
        'itemOrderAmount'=> rand(200,5000),
        'orderId'=>Str::random(10) ,
        'paymentStatus'=> rand(-1,1),


    ];
});
