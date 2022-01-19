<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->string('loanable_id');
            $table->string('loanable_type');
            $table->string('loan_type');
            $table->double('loan_interest_rate');
            $table->double('min_loan_range');
            $table->double('max_loan_range');
            $table->longText('loan_description');
            $table->integer('repayment_status');
            $table->double('active_loan_users');
            $table->double('active_loan_repayments');
            $table->double('passive_loan_users');
            $table->double('passive_loan_repayments');
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
        Schema::dropIfExists('loans');
    }
}
