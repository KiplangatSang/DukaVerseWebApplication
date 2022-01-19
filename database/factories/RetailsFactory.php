<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Retails\Retail;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Retail::class, function (Faker $faker) {
    return [
        //
         'retailNameId'=>Str::random(1,100000),
         'retailNameId'=>Str::random(1,100000),
         'retailable_id'=>rand(1000,100000),
         'retailable_type'=>Str::random(1,100000),
         'retailName'=>$faker-> name ." ". 'Shop',
         'retailGoods'=>Str::random(1,100000),
         'retailTown'=>Str::random(1,100000),
         'retailConstituency'=>Str::random(1,100000),
         'retailCounty'=>Str::random(1,100000),
         'retailPicture'=>Str::random(1,100000),
         'retailEmployees_number'=>rand(1000,100000),
         'retailStockEstimate'=>rand(1000,100000),





    ];
});
