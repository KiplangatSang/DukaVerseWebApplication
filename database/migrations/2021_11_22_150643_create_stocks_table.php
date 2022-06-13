<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table-> string('stockNameId');
            $table-> bigInteger('stockable_id');
            $table-> string('stockable_type');
            //items table reference
            $table-> bigInteger('retail_item_id');

            //suppliers ref
            $table-> string('suppliers_id')->nullable();

            $table-> string('stockName');
            $table-> string('stockSize');
            $table->longText('stockImage');
            $table-> unsignedBigInteger('stockAmount');
            $table-> string('brand');
            $table-> double('selling_price');
            $table-> unsignedBigInteger('buying_price');
            $table->boolean('isRequired')->nullable();

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
        Schema::dropIfExists('stocks');
    }
}
