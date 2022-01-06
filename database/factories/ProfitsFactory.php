<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Payments\Profit;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Profit::class, function (Faker $faker) {
    return [
        //
        'profitId'=> Str::random(10),
        'profitAmount'=> rand(2000,20000)
    ];
});
