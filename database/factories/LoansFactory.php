<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Loans\Loans;
use App\Model;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Loans::class, function (Faker $faker) {
    return [
        //
        'loan_id'=> Str::random(12),
        'loanable_id'=> 1,
        'loanable_type'=> 'App\Retails\Retail',
        'loan_type'=> $faker->name,
        'loan_name'=> $faker->name,
        'loan_interest_rate'=> rand(7,10),
        'min_loan_range'=> rand(1,10),
        'max_loan_range'=> rand(10,20),
        'loan_description'=>$faker->paragraph(),
        'loan_regulation'=>$faker->sentence,
    ];
});


