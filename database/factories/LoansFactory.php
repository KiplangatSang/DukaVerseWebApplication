<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loans\Loans;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Loans::class, function (Faker $faker) {
    return [
        //


        'loanable_id'=> Str::random(1,100000),
        'loanable_type'=> Str::random(1,100000),
        'min_loan_range'=> rand(1000,100000),
        'max_loan_range'=> rand(10000,1000000),
        'repayment_status'=>rand(-1,1),
        //'repay_amount'=> rand(100,1000),
        'loan_description'=>$faker->paragraph(4),
        'active_loan_users'=>rand(100,1000),
        'active_loan_repayments'=>rand(100,1000),
        'passive_loan_users'=>rand(100,1000),
        'passive_loan_repayments'=>rand(100,1000),
    ];
});
