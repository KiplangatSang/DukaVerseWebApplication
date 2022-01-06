<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Supplies\Orders;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Orders::class, function (Faker $faker) {
    return [
        //

            'orderId'=> Str::random(10),
            'orderItemsCount'=> rand(200,5000),
            'orderDate'=>now(),
            'paymentStatus'=>rand(-1,1),
            'retailNameId'=>Str::random(10),
            'retailOwnerId'=> Str::random(10),


    ];
});
