
<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employees\RetailSalary;
use App\Retails\Retail;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(RetailSalary::class, function (Faker $faker) {

    return [
        //
        "salaryable_id" => 1,
        "salaryable_type" => 'App\Retails\Retail',
        "emp_id" => 2,
        "amount" => 200,
        "deductions" => 10,
        "allowances" => 10,
        "total_payable" => 200,
        "paid_by" => 1,
        "account" => 1,
        "comment" => Str::random(12),
    ];
});
