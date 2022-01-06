<?php

use App\RequiredItems\RequiredItems;
use Illuminate\Database\Seeder;

class RequiredItemsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        factory(RequiredItems::class,10)
        ->create();
    }
}
