<?php

use App\Supplies\Orders;
use Illuminate\Database\Seeder;

class OrdersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Orders::class,10)
        ->create();
    }
}
