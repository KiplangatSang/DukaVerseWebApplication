<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Roles;
use Faker\Generator as Faker;

$factory->define(Roles::class, function (Faker $faker) {
    return [
        //

          'county'=>rand(1,36),
             'role_id'=>rand(1,3),
             'is_super_admin'=>rand(1,3),
            'is_super_admin'=>rand(1,3),
            'is_retail_owner'=>rand(1,3),
             'is_employee'=>rand(1,3),


    ];
});
