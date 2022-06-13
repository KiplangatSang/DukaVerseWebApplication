<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionRetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('session_retails', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("retailable_id");
            $table->string("retailable_type");
            $table-> string('retailNameId');
            $table-> bigInteger('retail_id');
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
        Schema::dropIfExists('session_retails');
    }
}
