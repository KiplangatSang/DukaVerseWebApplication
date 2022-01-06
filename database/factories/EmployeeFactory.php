<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees;
use Faker\Generator as Faker;


$factory->define(Employees::class, function (Faker $faker) {
    return [
        'empName' => $faker->name,
        'empNationalId' => rand(20000,400000),
        'pin' => rand(2000,4000),
        'userName' => $faker->name,
        'retailNameId' => rand(20000,400000),
        'retailOwnerId' => rand(2000,30000),
        'employerId'=> rand(2000,30000),
        'dateEmployed' => now(),
        'salary'=> rand(2000,30000),
    ];
});
