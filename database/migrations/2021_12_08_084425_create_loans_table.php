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
            $table->string('loan_id');
            $table->string('loanable_id');
            $table->string('loanable_type');
            $table->string('loan_type');
            $table->string('loan_name');
            $table->double('loan_interest_rate');
            $table->double('min_loan_range');
            $table->double('max_loan_range');
            $table->longText('loan_description');
            $table->longText('loan_regulation');
            $table->timestamps();
        });
    }

       // $table->integer('repayment_status')->nullable();
            // $table->double('active_loan_users')->nullable();
            // $table->double('active_loan_repayments')->nullable();
            // $table->double('passive_loan_users')->nullable();
            // $table->double('passive_loan_repayments')->nullable();
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
