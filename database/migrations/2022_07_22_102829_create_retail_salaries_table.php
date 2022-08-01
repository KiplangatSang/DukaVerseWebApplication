<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_salaries', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('salaryable_id');
            $table->string('salaryable_type');
            $table->string('emp_id');
            $table->double('amount');
            $table->double('deductions')->nullable();
            $table->double('allowances')->nullable();
            $table->double('total_payable')->default(0);
            $table->string('paid_by')->nullable();
            $table->string('account_id');
            $table->string('comment');
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
        Schema::dropIfExists('retail_salaries');
    }
}
