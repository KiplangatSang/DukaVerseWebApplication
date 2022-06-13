<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplies\Supplies;
use Faker\Generator as Faker;


$factory->define(Supplies::class, function (Faker $faker) {
    return [

        'supply_id' =>rand(200,2000),
        'supplier_id' =>rand(8,12),
        'supplyable_id' =>rand(8,12),
        'supplyable_type' => 'App\Retails\Retail',
        'supply_items' => $faker->name,
        'pay_status' => rand(-1,1),
        'payment_balance' => rand(10,10000),
    ];
});
