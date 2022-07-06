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
            $table-> bigInteger('retail_owners_id');
            $table-> string('retails_id');
            $table-> string('retailOwnerName');
            $table-> string('users_id');
            $table-> string('national_id')->nullable();
            $table-> string('kra')->nullable();
            $table-> string('alternate_phone_no')->nullable();
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
