<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStorm5EmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('storm5_employees', function (Blueprint $table) {
            $table->id();
            $table->id();
            $table->bigInteger('storm5employeeable_id');
            $table->longText('storm5employeeable_type');
            $table->string('empName');
            $table->string('empEmail');
            $table->string('empPhoneno');
            $table->unsignedBigInteger('empNationalId');
            $table->unsignedBigInteger('pin');
            $table->string('userName');
            $table->string('empRole');
            $table->string('dateEmployed');
            $table->double('salary');
            $table->string('county');
            $table->string('constituency');
            $table->string('town');
            $table->string('office');
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
        Schema::dropIfExists('storm5_employees');
    }
}
