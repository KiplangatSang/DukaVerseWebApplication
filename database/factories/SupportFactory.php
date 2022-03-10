<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Support\Support;
use Faker\Generator as faker;
use Illuminate\Support\Str;


$factory->define(Support::class, function (Faker $faker) {
    return [
        //
        'ticket' =>Str::randomn(10),
        'sender' => $faker->name,
        'title' => $faker->jobTitle(),
        'messages' => $faker->paragraph,
    ];
});
