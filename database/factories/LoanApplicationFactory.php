<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\LoanApplication;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(LoanApplication::class, function (Faker $faker) {
    return [
        //

        'loanapplicable_id'=> Str::random(1,100000),
        'loanapplicable_type'=> Str::random(1,100000),
        'loan_type'=> Str::random(1,100000),
        'loan_id'=> rand(1,20),
        'loan_amount'=> rand(1000,100000),
        'loan_duration'=> rand(10000,1000000),
        'loan_interest'=> rand(10000,1000000),
        'loan_status'=>rand(-1,1),
        'loan_interest_rate'=> rand(10,25),
        'loan_assigned_at'=>$faker->paragraph(4),
        'loan_assigned_by'=>$faker->name,
        'loan_repaid_amount'=> rand(10000,1000000),
    ];
});
