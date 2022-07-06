<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_items', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('requiredable_id');
            $table-> string('requiredable_type');
            $table-> unsignedBigInteger('employees_id')->nullable();
            $table->bigInteger('retail_items_id');
            $table-> unsignedBigInteger('required_amount')->nullable();
            $table-> unsignedBigInteger('ordered_amount')->nullable();
            $table-> double('projected_cost');
            $table-> boolean('is_ordered')->default(false);
            $table-> bigInteger('orders_id')->nullable();
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
        Schema::dropIfExists('required_items');
    }
}
