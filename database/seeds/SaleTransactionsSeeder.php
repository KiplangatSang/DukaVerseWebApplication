<?php

use App\Sales\SaleTransactions;
use Illuminate\Database\Seeder;

class SaleTransactionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(SaleTransactions::class, 10)
            ->create();
    }
}
