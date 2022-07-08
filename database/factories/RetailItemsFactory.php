<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Retail\RetailItems;
use Faker\Generator as Faker;

$factory->define(RetailItems::class, function (Faker $faker) {
    return [
        //
        'itemable_id' => 1,
        'itemable_type' => "App\Retails\Retail",
        'name' => $faker->name,
        'brand' => "Mandazi",
        'size' => rand(2, 10) . " kg",
        'image' => " https://storage.googleapis.com/dukaverse-e4f47.appspot.com/app/AIRTEL.png",
        'selling_price' => rand(300, 350),
        'buying_price' => rand(200, 300),
        'description' => $faker->paragraph(),
        'regulation' => $faker->paragraph(),
        'suppliers_id' => 1,
        'is_required' => $faker->boolean,
    ];
});
