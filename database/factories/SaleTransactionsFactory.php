<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sales\SaleTransactions;
use Faker\Generator as Faker;

$factory->define(SaleTransactions::class, function (Faker $faker) {
    return [
        //

        'transactionable_id' => 1,
        'transactionable_type' => "App\Retails\Retail",
        'transaction_id' => $faker->imei(),
        'paid_amount' => rand(2300, 4000),
        'balance' => rand(230, 400),
        'discount' => rand(230, 400),
        'deductions' => rand(23, 40),
        'on_hold' => true,
        'pay_status' => true,
        'on_credit' => $faker->boolean(),
        'is_active' => $faker->boolean(),
    ];
});
