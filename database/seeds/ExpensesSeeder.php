<?php

use App\Payments\Expenses;
use Illuminate\Database\Seeder;

class ExpensesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Expenses::class,10)
        ->create();
    }
}
