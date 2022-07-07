<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Subscriptions\Subscription;
use Faker\Generator as Faker;


$factory->define(Subscription::class, function (Faker $faker) {
    $subscription_duration =  array(
        "first" => " 3 months",
        "second" => "6 months",
        "third" => "12 months",
    );
    $subscription_price =  array(
        "first" => "1",
        "second" => "2",
        "third" => "3",
    );
    $subscription_categories = array(
        "first" => " Gold monthly",
        "second" => "Gold 6 months",
        "third" => "Gold 12 months",
    );
    $subscription_discount = array(
        "first" => 1,
        "second" => 3,
        "third" => 6,
    );
    $goldpackage = array(
        "first" => "Storage",
        "second" => "Reports",
        "third" => "Management",
        "fourth" => "LoanAccess",
        "fifth" =>  "Bank Payment",
        "sixth" =>  "Multiple Retails",
    );
    $basicPackage = array(
        "first" => "Storage",
        "second" => "Reports",
        "third" => "Management",
        "fourth" => "14 Day
        Free",

    );

    $silverPackage = array(
        "first" =>   "Storage",
        "second" => "Reports",
        "third" =>   "Management",
        "fourth" =>   "loan",
        "fifth" =>   "Access",
        "sixth" =>  "Bank",
        "seventh" =>  "Payment",
    );
    return [
        //
        "subscriptionable_id" => 1,
        "subscriptionable_type" => "App\user",
        "subscription_name" => $faker->name,
        "subscription_description" => json_encode($goldpackage),
        "subscription_duration" => json_encode($subscription_duration),
        "subscription_price" => json_encode($subscription_price),
        "subscription_status" => $faker->boolean(),
        "subscription_level" => rand(0, 3),
        "subscription_discount" => json_encode($subscription_discount),
        "subscription_categories" => json_encode($subscription_categories),
    ];
});
