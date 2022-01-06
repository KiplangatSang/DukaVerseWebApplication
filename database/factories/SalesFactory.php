<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Sales;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Sales::class, function (Faker $faker) {
    return [
        //
        'itemNameId'=>$faker->name,
'itemName'=>$faker->name,
'itemSize'=>rand(200,2000),
'itemAmount'=>rand(200,2000),
'price'=>rand(200,2000),

    ];
});
