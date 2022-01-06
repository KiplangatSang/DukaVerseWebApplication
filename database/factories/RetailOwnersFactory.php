<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Retails\RetailOwner;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(RetailOwner::class, function (Faker $faker) {
    return [
        //
        'retailOwnerId' => Str::random(10),
        'retailOwnerName' => $faker->name,
        'pin'=>rand(1000,9999),
        'phoneno'=>rand(1000000000,100000000000),
        'email' => $faker->safeEmail,
    ];
});
