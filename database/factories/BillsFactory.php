<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bills\Bills;
use Faker\Generator as Faker;

$factory->define(Bills::class, function (Faker $faker) {
    return [
        //
           'billable_id'=> rand(1,13),
           'billable_type'=> 'App\Retails\Retail',
           'billName'=> $faker->name,
           'billDescription'=> $faker->paragraph,
           'billAmount'=> rand(1000, 888899),
           'billPaymentStatus'=> rand(1,13),
    ];
});
