<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Stock\Stock;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Stock::class, function (Faker $faker) {
    return [

        'stockNameId' => $faker->name,
        'stockable_id' =>  rand(2,11),
        'stockable_type' => 'App\Employee',
        'retailstockable_id' => rand(10,11),
        'retailstockable_type' => 'App\Retails\Retail',
        'supplierstockable_id' => rand(10,11),
        'supplierstockable_type' => 'App\Supplies\Supplies',
        'stockName' => $faker->name,
        'stockSize' =>rand(200,2000),
        'stockAmount' =>rand(200,2000),
        'brand' => $faker->name,
         'price'=>rand(200,2000),
         'totalCost'=>rand(200,2000),


    ];
});
