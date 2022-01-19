<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retails', function (Blueprint $table) {
            $table->id();
            $table-> string('retailNameId');
            $table-> bigInteger('retailable_id');
            $table-> string('retailable_type');
            $table-> string('retailName');
            $table-> longText('retailGoods');
            $table-> string('retailTown');
            $table-> string('retailConstituency');
            $table-> string('retailCounty');
            $table-> string('retailPicture');
            $table-> string('retailEmployees_number');
            $table-> string('retailStockEstimate');
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
        Schema::dropIfExists('retails');
    }
}
