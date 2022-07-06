<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Accounts\Account;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Account::class, function (Faker $faker) {
    return [
        //
        'accountable_id' => 1,
        'accountable_type' => 'App\Retails\Retail',
        "account" => Str::random(12),
        "account_ref" => Str::random(12),
    ];
});
