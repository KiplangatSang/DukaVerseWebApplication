<?php

use App\Payments\Revenue;
use Illuminate\Database\Seeder;

class RevenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Revenue::class,10)
        ->create();
    }
}
