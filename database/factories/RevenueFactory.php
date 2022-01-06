<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Payments\Revenue;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Revenue::class, function (Faker $faker) {
    return [
        //
        'revenueId'=>$faker->name,
        'revenueItemId'=>rand(200,2000),
        'itemPrice'=>rand(200,2000),
        'sellingPrice'=>rand(200,2000),
        'revenue' =>rand(200,2000),
    ];
});
