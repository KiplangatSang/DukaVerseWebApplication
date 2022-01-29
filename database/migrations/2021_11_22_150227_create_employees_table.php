<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('employeeable_id');
            $table->longText('employeeable_type');
            $table->string('empName');
            $table->string('empEmail');
            $table->unsignedBigInteger('empNationalId');
            $table->unsignedBigInteger('pin');
            $table->string('userName');
            $table->string('empRole');
            $table->string('dateEmployed');
            $table->double('salary');
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
        Schema::dropIfExists('employees');
    }
}
