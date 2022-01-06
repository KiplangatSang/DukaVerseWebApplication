<?php

use App\Retails\RetailOwner;
use Illuminate\Database\Seeder;

class RetailOwnersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(RetailOwner::class,10)
        ->create();
    }
}
