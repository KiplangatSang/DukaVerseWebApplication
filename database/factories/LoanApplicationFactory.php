<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loans\LoanApplication;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(LoanApplication::class, function (Faker $faker) {
    return [
        //
        'application_id'=> Str::random(12),
        'loanapplicable_id'=> 1,
        'loanapplicable_type'=> 'App\Retails\Retail',
        //'loan_type'=> Str::random(1,100000),
        'loans_id'=> rand(1,10),
        'users_id'=> rand(1,10),
        'loan_amount'=> rand(1,10),
        'loan_duration'=> rand(1,10),
        'loan_status'=>rand(-2,2),
        'loan_repaid_amount'=>rand(1,2),
        'repayment_status'=>$faker->boolean(),
        'loan_assigned_at'=>now(),
        'loan_assigned_by'=>$faker->name,
    ];
});


