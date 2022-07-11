<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanApplicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loan_applications', function (Blueprint $table) {
            $table->id();
            $table->longText('application_id');
            $table->bigInteger('loanapplicable_id');
            $table->string('loanapplicable_type');
            $table->bigInteger('loans_id');
            $table->bigInteger('users_id');
            $table->double('loan_amount');
            $table->double('disbursed_amount')->nullable()->default(0);
            $table->double('repay_amount')->nullable();
            $table->integer('loan_duration')->nullable();
            $table->integer('loan_status')->default(-1);
            $table->double('loan_discount')->default(0);
            $table->double('loan_repaid_amount')->default(0);
            $table->boolean('repayment_status')->default(false);
            $table->string('loan_assigned_at')->nullable();
            $table->string('loan_assigned_by')->nullable();
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
        Schema::dropIfExists('loan_applications');
    }

       //loan_status
        /**
         * -2 = defaulted
         * -1 = sent
         * 0 = processed
         * 1 = disbursed
         * 2 = repaid
         */

        //repayment_status
        /**
         * true = repaid
         * false = not repaid
         */

        //loan_assigned_by
        /**
         * the person who processed the loan in the admin side
         */

        //disbursed_amount
        /**
         * the assigned amount to the loanee
         */
        //repay_amount
        /**
         * the amount to be paid by the loanee less the discount
         */
}
