<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Payments\Expenses;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Expenses::class, function (Faker $faker) {
    return [
        //


        'expenseabe_id'=> rand(200,3000),
        'expenseabe_type'=> Str::random(10),
        'entered_by'=>$faker->name,
        'expenseItem'=> Str::random(10),
        'expense_date'=> now(),
        'cost'=> rand(200,3000),


    ];
});
