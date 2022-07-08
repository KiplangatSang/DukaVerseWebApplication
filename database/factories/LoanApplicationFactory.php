<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loans\LoanApplication;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(LoanApplication::class, function (Faker $faker) {
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
        'application_id'=> Str::random(12),
        'loanapplicable_id'=> 1,
        'loanapplicable_type'=> 'App\Retails\Retail',
        'loans_id'=> rand(1,10),
        'users_id'=> rand(1,10),
        'loan_amount'=> rand(1,10),
        'loan_duration'=> rand(1,10),
        'loan_status'=>rand(-2,2),
        'loan_repaid_amount'=>rand(1,2),
        'repayment_status'=>$faker->boolean(),
        'loan_assigned_at'=>now(),
        'loan_assigned_by'=>$faker->name,
        "created_at" => $getDate,
    ];
});


