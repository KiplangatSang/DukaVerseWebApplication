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
            $table->integer('loan_duration');
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
}
