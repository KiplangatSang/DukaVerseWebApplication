<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Stock\Stock;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Stock::class, function (Faker $faker) {
    return [

        'stockNameId' => $faker->name,
        'stockName' => $faker->name,
        'stockSize' =>rand(200,2000),
        'stockAmount' =>rand(200,2000),
        'brand' => $faker->name,
         'price'=>rand(200,2000),
         'totalCost'=>rand(200,2000),
         'retailNameId'=>rand(200,2000),
         'retailOwnerId'=>rand(200,2000),

    ];
});
