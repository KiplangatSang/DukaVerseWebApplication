<?php

use App\Supplies\OrderItems;
use Illuminate\Database\Seeder;

class OrderItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(OrderItems::class,10)
        ->create();
    }
}
