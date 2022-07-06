<?php

use App\Loans\LoanApplication;
use Illuminate\Database\Seeder;

class LoanApplicationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(LoanApplication::class,10)
        ->create();
    }
}
