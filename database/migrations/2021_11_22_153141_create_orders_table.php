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
            $table-> string('retailorderable_id');
            $table-> string('retailorderable_type');
            $table-> longText('ordered_items');
            $table-> unsignedBigInteger('orderItemsCount');
            $table-> string('orderDate');
            $table-> string('paymentStatus');
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
