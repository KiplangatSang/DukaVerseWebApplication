<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RequiredItems\RequiredItems;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(RequiredItems::class, function (Faker $faker) {
    return [
        //$table-> string('requiredItemId');


        'requiredItemId' => Str::random(10),
        'requiredable_id' =>  rand(2, 11),
        'requiredable_type' => 'App\Retails\Retail',
        'requiredItem'  => $faker->name,
        'employees_id' => rand(10, 20),
        'stock_id'  => rand(1, 20),
        'requiredAmount' => rand(200, 400),
        'projectedCost' => rand(200, 400),
        'requiredStatus' => rand(-1, 1),


    ];
});
