<?php

use App\Bills\Bills;
use Illuminate\Database\Seeder;

class BillsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

      factory(Bills::class,10)
      ->create();
    }
}
