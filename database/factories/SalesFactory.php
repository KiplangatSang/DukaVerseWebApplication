<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Sales\Sales;
use Faker\Generator as Faker;


$factory->define(Sales::class, function (Faker $faker) {
    return [
        //
        'retailsaleable_id' => 1,
        'retailsaleable_type' => "App\Retails\Retail",
        'code' => $faker->imei,
        'on_credit' => $faker->boolean(),
        'selling_price' => rand(200 , 300),
        'employees_id' => 1,
        'retail_items_id' => 2,
      //  'supplier_id' => 1,
        'sale_transaction_id' => 1,

    ];
    // 'created_at' => $faker->date("Y-m-d H:i:s"),
    // 'updated_at' =>  $faker->date("Y-m-d H:i:s"),
    //'itemImage' =>

});
