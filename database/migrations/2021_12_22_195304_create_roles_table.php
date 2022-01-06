<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('roleable_id')->default(1);
            $table->string('roleable_type')->nullable();
            $table->bigInteger('county');
            $table->integer('role_id');
            $table->integer('is_super_admin');
            $table->integer('is_retail_owner');
            $table->integer('is_employee');
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
        Schema::dropIfExists('roles');
    }
}
