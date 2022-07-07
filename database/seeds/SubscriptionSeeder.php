<?php

use App\Subscriptions\Subscription;
use Illuminate\Database\Seeder;

class SubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

       factory(Subscription::class,3)
       ->create();
    }
}
