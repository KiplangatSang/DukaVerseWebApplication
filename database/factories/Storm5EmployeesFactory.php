<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Storm5Employees;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Storm5Employees::class, function (Faker $faker) {
    return [
        //

        'storm5employeeable_id'=>rand(2,10),
        'storm5employeeable_type' => "App\Retails\Retail",
        'empName' => $faker->name,
        'empEmail' => $faker->email,
        'empPhoneno'=>rand(20000,400000),
        'empNationalId' => rand(20000,400000),
        'pin' => rand(2000,4000),
        'userName' => $faker->name,
        'empRole' => Str::random(10),
         'dateEmployed' => now(),
        'salary'=> rand(2000,30000),
        'constituency'=>$faker->city,
        'town'=>$faker->city,
        'office'=>$faker->city,
    ];
});
