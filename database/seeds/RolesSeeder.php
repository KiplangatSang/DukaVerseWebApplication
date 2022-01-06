<?php

use App\Roles;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
      factory(  Roles::class,10)
        ->create();
    }
}
