<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RequiredItems\RequiredItems;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(RequiredItems::class, function (Faker $faker) {
    return [
        //$table-> string('requiredItemId');


            'requiredItemId'=> Str::random(10),
            'requiredable_id' =>  rand(2,11),
        'requiredable_type' => 'App\Employee',
        'retailrequiredable_id' => rand(10,11),
        'retailrequiredable_type' => 'App\Retails\Retail',
            'requiredItem'  => $faker->name,
            'requiredAmount' => rand(200,400),
            'projectedCost' => rand(200,400),
            'requiredStatus'=> rand(-1,1),

    ];
});
