<?php

use App\Customer\CustomerCredit;
use Illuminate\Database\Seeder;

class CustomerCreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(CustomerCredit::class,10)
        ->create();
    }
}
