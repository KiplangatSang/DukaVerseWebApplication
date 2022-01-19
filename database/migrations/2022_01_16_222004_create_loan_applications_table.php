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
            $table->bigInteger('loanapplicable_id');
            $table->string('loanapplicable_type');
            $table->string('loan_type');
            $table->bigInteger('loan_id');
            $table->double('loan_amount');
            $table->integer('loan_duration');
            $table->double('loan_interest');
            $table->integer('loan_status');
            $table->string('loan_assigned_at')->nullable();
            $table->string('loan_assigned_by')->nullable();
            $table->double('loan_repaid_amount');
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
