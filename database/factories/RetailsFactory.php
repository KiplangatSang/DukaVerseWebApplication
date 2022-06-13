<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\Retails\Retail;
use Faker\Generator as Faker;
use Illuminate\Support\Str;


$factory->define(Retail::class, function (Faker $faker) {

    $items = array();

    for ($i = 0; $i < 20; $i++) {
        $requireditem = $faker->name();
        $items[$i + 1] = $requireditem;
    }
    return [

         //"retailable_id"=>rand(10,13),
         "retailable_id"=>11,
         "retailable_type"=>"App\User",
         "retail_Id"=>Str::random(1,100000),
         "retail_name"=>"Mama Ann",
         "retail_goods"=> json_encode($items),
         "retail_town"=> Str::random(1,100000),
         "retail_constituency"=> Str::random(1,100000),
         "retail_county"=> Str::random(1,100000),
    ];
});
