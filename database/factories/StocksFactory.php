<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Stock\Stock;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use phpDocumentor\Reflection\Types\Boolean;

$factory->define(Stock::class, function (Faker $faker) {
    return [
        'code' => Str::random(30),
        'stockable_id' =>  1,
        'stockable_type' => 'App\Retails\Retail',
        'retail_items_id' => rand(1, 10),
        'isRequired' => $faker->boolean,
    ];
});
