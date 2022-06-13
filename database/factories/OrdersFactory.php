<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Supplies\Orders;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Orders::class, function (Faker $faker) {
    $items = array();

    for ($i = 0; $i < 20; $i++) {


        $requireditem = $faker->name();
        $items[$i + 1] = $requireditem;
        // $requiredItems = array_merge($requiredItems,$data);

    }

    return [
        'orderId' => Str::random(10),
        'orderable_id' =>  rand(8, 11),
        'orderable_type' => 'App\Retails\Retail',
        'ordered_items' => json_encode($items),
        'orderItemsCount' => rand(200, 5000),
        'orderDate' => now(),
        'paymentStatus' => rand(-1, 1),
        'orderStatus' => rand(-1, 1),
        'suppliers_id' => rand(1, 10),
    ];
});
