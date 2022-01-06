<?php

use App\Supplies\Supplies as SuppliesSupplies;
use Illuminate\Database\Seeder;

class SuppliesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(SuppliesSupplies::class)
        ->create();
    }
}
