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
            $table-> bigInteger('retailstockable_id');
            $table-> string('retailstockable_type');
            $table-> bigInteger('supplierstockable_id');
            $table-> string('supplierstockable_type');
            $table-> string('stockName');
            $table-> string('stockSize');
            $table-> unsignedBigInteger('stockAmount');
            $table-> string('brand');
            $table-> double('price');
            $table-> unsignedBigInteger('totalCost');
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
