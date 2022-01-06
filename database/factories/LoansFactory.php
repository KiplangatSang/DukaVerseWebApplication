<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loans\Loans;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Loans::class, function (Faker $faker) {
    return [
        //


        'loanable_id'=> Str::random(10),
        'loanAmount'=> rand(1000,100000),
        'loanable_type'=> Str::random(10),
        'repayment_status'=>rand(-1,1),
        'repay_amount'=> rand(100,1000),

    ];
});
