<?php

use App\Supplies\Suppliers;
use Illuminate\Database\Seeder;

class SuppliersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Suppliers::class)
        ->create();
    }
}
