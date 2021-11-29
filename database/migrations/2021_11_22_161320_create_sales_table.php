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
            $table-> string('itemNameId');
            $table-> string('itemName');
            $table-> string('itemSize');
            $table-> unsignedBigInteger('itemAmount');
            $table-> double('price');
            $table-> string('date');
            $table-> string('dayOfWeek');
            $table-> string('month');
            $table-> unsignedBigInteger('year');
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
