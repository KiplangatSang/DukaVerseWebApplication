<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatesRetailownerablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retailownerables', function (Blueprint $table) {
            $table->unsignedBigInteger('retail_owner_id');
            $table->unsignedBigInteger('retailownerables_id');
            $table->unsignedBigInteger('retailownerables_type');
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
        Schema::dropIfExists('retailownerables');
    }
}
