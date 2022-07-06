<?php

use App\Stock\Stock as StockStock;
use Illuminate\Database\Seeder;

class StockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

       factory(StockStock::class,50)
        ->create();
    }
}
