<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRevenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('revenues', function (Blueprint $table) {
            $table->id();

            $table-> string('revenueId');
            $table-> string('revenueDate');
            $table-> string('dayOfWeek');
            $table-> string('itemName');
            $table-> double('itemPrice');
            $table-> double('sellingPrice');
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
        Schema::dropIfExists('revenues');
    }
}
