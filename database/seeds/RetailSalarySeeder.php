<?php

use App\Employees\RetailSalary;
use Illuminate\Database\Seeder;

class RetailSalarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(RetailSalary::class, 10)
            ->create();
    }
}
