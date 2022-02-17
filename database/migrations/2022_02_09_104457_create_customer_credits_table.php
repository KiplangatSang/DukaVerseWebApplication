<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomerCreditsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_credits', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('custcreditable_id');
            $table-> string('custcreditable_type');
            $table-> string('itemName');
            $table-> string('itemDescription');
            $table-> string('amount');
            $table-> double('requiredAmount');
            $table-> double('amountPaid');
            $table-> unsignedBigInteger('retailID');
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
        Schema::dropIfExists('customer_credits');
    }
}
