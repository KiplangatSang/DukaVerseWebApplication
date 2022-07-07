<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("subscriptionable_id");
            $table->string("subscriptionable_type");
            $table->string("subscription_name");
            $table->string("subscription_description");
            $table->string("subscription_duration");
            $table->string("subscription_price");
            $table->boolean("subscription_status");
            $table->bigInteger("subscription_level")->default(1);
            $table->bigInteger("subscription_discount")->default(0);
            $table->string("subscription_categories")->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subscriptions');
    }
}
