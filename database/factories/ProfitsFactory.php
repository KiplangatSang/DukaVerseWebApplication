<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Payments\Profit;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Profit::class, function (Faker $faker) {
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
        "profitable_id" => 1,
        "profitable_type" => "App\Retails\Retail",
        "profitId" => 1,
        "profit_amount" => rand(2000, 20000),
        "month" => $month,
        "year" => $year,
        "created_at" => $getDate,

    ];
});
