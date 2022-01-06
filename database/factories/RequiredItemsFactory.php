<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RequiredItems\RequiredItems;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(RequiredItems::class, function (Faker $faker) {
    return [
        //
            'requiredItemId'=> Str::random(10),
            'requiredItem'  => $faker->name,
            'requiredAmount' => rand(200,400),
            'projectedCost' => rand(200,400),
            'requiredStatus'=> rand(-1,1),

    ];
});
