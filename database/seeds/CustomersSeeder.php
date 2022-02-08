<?php

use App\Customers\Customers;
use App\Retails\Retail;
use Illuminate\Database\Seeder;

class CustomersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

      factory(Customers::class,10)
        ->create();
    }
}
