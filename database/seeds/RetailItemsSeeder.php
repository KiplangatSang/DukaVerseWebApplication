<?php

use App\Retail\RetailItems;
use Illuminate\Database\Seeder;

class RetailItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(RetailItems::class,10)
        ->create();
    }
}
