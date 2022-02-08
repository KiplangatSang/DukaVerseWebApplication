<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Supplies\Suppliers;
use Faker\Generator as Faker;

$factory->define(Suppliers::class, function (Faker $faker) {
    return [
        // //
        'name' => $faker->name,
        'id_number' => rand(1000000, 100000000),
        'phone_number' => rand(700000000, 799999999),
        'email' => $faker->email,
        'address' => $faker->address,
    ];
});
