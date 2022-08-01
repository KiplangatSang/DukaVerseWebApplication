<?php

use App\Employees\RetailSalary;
use App\Retails\Retail;
use Illuminate\Database\Seeder;

class RetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(RetailSalary::class,10)
        ->create();
    }
}
