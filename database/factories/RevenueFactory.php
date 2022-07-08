<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Payments\Revenue;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Revenue::class, function (Faker $faker) {
    $start_date = "2022-01-01";
    $end_date = "2022-12-10";
    // Convert to timetamps
    $min = strtotime($start_date);
    $max = strtotime($end_date);

    // Generate random number using above bounds
    $val = rand($min, $max);

    // Convert back to desired date format
    $getDate = date('Y-m-d H:i:s', $val);
    $month = date('M', $val);
    $year = date('M', $val);
    return [
        //
        'revenueable_id' => 1,
        'revenueable_type' =>"App\Retails\Retail",
        'revenueId' => $faker->name,
        'revenue' => rand(200, 2000),
        "month"=>$month,
        "year"=>$year,
        "created_at" => $getDate,

    ];
});
