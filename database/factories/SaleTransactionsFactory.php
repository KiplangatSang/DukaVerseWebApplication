<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sales\SaleTransactions;
use Faker\Generator as Faker;

$factory->define(SaleTransactions::class, function (Faker $faker) {
    $start_date ="2022-01-01";
    $end_date = "2022-12-10";
        // Convert to timetamps
        $min = strtotime($start_date);
        $max = strtotime($end_date);

        // Generate random number using above bounds
        $val = rand($min, $max);

        // Convert back to desired date format
        $getDate = date('Y-m-d H:i:s', $val);

    return [
        //
        'transactionable_id' => 1,
        'transactionable_type' => "App\Retails\Retail",
        'transaction_id' => $faker->imei(),
        'expense' => rand(2300, 4000),
        'paid_amount' => rand(2300, 4000),
        'balance' => rand(230, 400),
        'discount' => rand(230, 400),
        'deductions' => rand(23, 40),
        'on_hold' => true,
        'pay_status' => true,
        'on_credit' => $faker->boolean(),
        'is_active' => $faker->boolean(),
        "created_at" => $getDate
    ];
});
