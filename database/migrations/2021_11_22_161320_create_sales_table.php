<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('retailsaleable_id');
            $table-> string('retailsaleable_type');
            $table-> string('code');
            $table-> boolean('on_credit')->default(false);
            $table-> double('selling_price')->nullable();
            $table-> unsignedBigInteger('employees_id')->nullable();
            $table->bigInteger('retail_items_id');
            $table-> bigInteger('sale_transaction_id')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
