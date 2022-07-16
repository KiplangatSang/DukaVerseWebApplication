<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [

        'username' => $faker->name,
        // 'email' => $faker->unique()->safeEmail,
        'email' =>"admin@test.com",
        'email_verified_at' => now(),
        'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        'userpin'=> rand(1000,9999),
        'phoneno'=> 254714680763,
        'terms_and_conditions'=>'Accepted',
        'is_owner'=>false,
        'is_employee'=>false,
         'is_admin' => true,
         'role' => 0,
         'is_suspended' => false,
         'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
         'remember_token' => Str::random(10),
         'api_token' => Str::random(60),
         'month' => $faker->month,
         'year' => date('Y'),
    ];
});
