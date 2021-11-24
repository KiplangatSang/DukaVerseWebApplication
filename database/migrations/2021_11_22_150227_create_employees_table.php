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
           $table -> string('empName');
           $table -> int('empNationalId');
           $table -> int('pin');
           $table -> string('userName');
           $table -> string('retailNameId');
           $table ->string ('retailOwnerId');
           $table -> string('employerId');
           $table -> string('dateEmployed');
           $table -> double('salary');
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
