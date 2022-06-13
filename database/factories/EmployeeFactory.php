<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees\Employees;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Employees::class, function (Faker $faker) {
    return [
        //'employeeable_id'=>rand(1,13),
        'employeeable_id'=>11,
        'employeeable_type' => "App\Retails\Retail",
        'emp_name' => $faker->name,
        'emp_email' => $faker->email,
        'emp_phoneno'=>rand(20000,400000),
        'emp_role' => Str::random(10),
        'emp_ID' => rand(20000,400000),
        'pin' => rand(2000,4000),
        'user_name' => $faker->name,
         'date_employed' => now(),
        'emp_salary'=> rand(2000,30000),
    ];
});
