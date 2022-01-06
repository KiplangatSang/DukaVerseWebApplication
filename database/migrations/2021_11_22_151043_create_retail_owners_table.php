<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailOwnersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_owners', function (Blueprint $table) {
            $table->id();
            $table-> string('retailOwnerId');
            $table-> string('retailOwnerName');
            $table-> string('pin');
            $table-> string('phoneno');
            $table-> string('email');
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
        Schema::dropIfExists('retail_owners');
    }
}
