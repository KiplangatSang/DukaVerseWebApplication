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
            $table-> string('stockName');
            $table-> string('stockSize');
            $table-> int('stockAmount');
            $table-> string('brand');
            $table-> int('price');
            $table-> int('totalCost');
            $table-> string('retailNameId');
            $table-> string('retailOwnerId');
            $table-> int('dayOfWeek');
            $table-> string('month');
            $table-> int('year');
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
