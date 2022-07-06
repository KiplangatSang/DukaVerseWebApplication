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
        'orderable_id' => 1,
        'orderable_type' => 'App\Retails\Retail',
        'ordered_items' => json_encode($items),
        'items_count' => rand(200, 5000),
        'order_status' => rand(-1, 1),
        'suppliers_id' => rand(1, 10),
        'projected_cost' => rand(200, 300),
        'actual_cost'=> rand(0, 300),
        'payment_status'=>$faker->boolean(),
        'delivery_status'=>$faker->boolean,
        'suppliers_id'=>rand(1,10),
    ];
});
