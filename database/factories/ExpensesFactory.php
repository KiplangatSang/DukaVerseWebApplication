<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Payments\Expenses;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Expenses::class, function (Faker $faker) {
    $start_date = "2022-01-01";
    $end_date = "2022-12-10";
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    $month = date('M', $val);
    $year = date('Y', $val);
    $getDate = date('Y-m-d H:i:s', $val);
    return [
        //
        'expenseable_id' => 1,
        'expenseable_type' => "App\Retails\Retail",
        'expenseId' => rand(1, 10),
        'expense' => rand(200, 3000),
        "month" => $month,
        "year" => $year,
        "created_at" => $getDate,
    ];
});
