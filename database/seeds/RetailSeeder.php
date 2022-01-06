<?php

use App\Retails\Retail;
use Illuminate\Database\Seeder;

class RetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(Retail::class,10)
        ->create();
    }
}
