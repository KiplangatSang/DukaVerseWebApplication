<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class SalesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       for($i=0; $i<50; $i++){
           DB::table('sales')->insert(
            [
                'itemNameId' => Str::random(12),
                'itemName' => Str::random(12),
                'itemSize' => Str::random(12),
                'itemAmount' => rand(2,1000),
                'price' => rand(300,10000),
            ]
            );}
        }
}
