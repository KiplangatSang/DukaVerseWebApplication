<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Customers\CustomerCredit;
use Faker\Generator as Faker;

$factory->define(CustomerCredit::class, function (Faker $faker) {
    return [
        //

        'creditable_id'=> rand(20, 23),
        'creditable_type'=> 'App\Customers\Customers',
        'itemName'=> $faker->name,
        'itemDescription'=>$faker->name,
        'amount'=> rand(1000000, 100000000),
        'requiredAmount'=> rand(1000000, 100000000),
        'amountPaid'=> rand(1000000, 100000000),
    ];
});
