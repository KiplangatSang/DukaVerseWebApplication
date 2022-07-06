<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\RequiredItems\RequiredItems;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(RequiredItems::class, function (Faker $faker) {
    return [
        'requiredable_id' =>  1,
        'requiredable_type' => 'App\Retails\Retail',
        'employees_id' => 1,
        'required_amount' => rand(200, 400),
        'projected_cost' => rand(200, 400),
        'retail_items_id' => rand(1, 10),
    ];
});
