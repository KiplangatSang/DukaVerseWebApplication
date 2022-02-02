<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Sales\Sales;
use Faker\Generator as Faker;


$factory->define(Sales::class, function (Faker $faker) {
    return [
        //
        'saleable_id' => rand(1, 10),
        'saleable_type' => "App\Employee",
        'retailsaleable_id' => 11,
        'retailsaleable_type' => "App\Retails\Retail",
        'itemNameId' => $faker->imei,
        'itemName' => $faker->name,
        'itemSize' => rand(200, 2000),
        'itemAmount' => rand(200, 2000),
        'price' => rand(200, 2000),

    ];
});
