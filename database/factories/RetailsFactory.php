<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Retails\Retail;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Retail::class, function (Faker $faker) {
    return [
        //
         'retailNameId'=>$faker->name,
         'retailName'=>$faker->name,
         'retailOwnerId'=>$faker->name,
         'userName'=>$faker->name,


    ];
});
