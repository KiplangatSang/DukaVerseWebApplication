<?php

use App\Payments\Profit;
use Illuminate\Database\Seeder;

class ProfitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

       factory( Profit::class,10)
        ->create();
    }
}
