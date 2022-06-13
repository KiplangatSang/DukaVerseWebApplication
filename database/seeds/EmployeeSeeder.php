<?php

use App\Employees\Employees;
use App\Retails\Retail;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Employees::class,10)
        ->create();
    }
}
