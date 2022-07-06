<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table-> string('orderId');
            $table-> string('orderable_id');
            $table-> string('orderable_type');
            $table-> longText('ordered_items');
            $table-> unsignedBigInteger('items_count');
            $table-> string('projected_cost');
            $table-> string('actual_cost')->nullable();
            $table-> integer('order_status');
            $table-> boolean('payment_status')->default(false);;
            $table-> boolean('delivery_status')->default(false);
            $table-> unsignedBigInteger('suppliers_id')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
