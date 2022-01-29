<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Employees::class, function (Faker $faker) {
    return [
        'employeeable_id'=>rand(2,10),
        'employeeable_type' => "App\Retails\Retail",
        'empName' => $faker->name,
        'empEmail' => $faker->email,
        'empRole' => Str::random(10),
        'empNationalId' => rand(20000,400000),
        'pin' => rand(2000,4000),
        'userName' => $faker->name,
         'dateEmployed' => now(),
        'salary'=> rand(2000,30000),
    ];
});
