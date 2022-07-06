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
            $table->bigInteger('user_id');
            $table->bigInteger('employeeable_id');
            $table->longText('employeeable_type');
            $table->string('emp_name');
            $table->string('emp_email');
            $table->string('user_name');
            $table->string('emp_ID');
            $table->unsignedBigInteger('emp_phoneno');
            $table->unsignedBigInteger('pin');
            $table->string('emp_role');
            $table->double('emp_salary');
            $table->string('date_employed');
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
