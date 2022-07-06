<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("trans_id");
            $table->integer("transactionable_id");
            $table->string("transactionable_type");
            $table->string("amount");
            $table->string("gateway");
            $table->bigInteger("accounts_id")->nullable();
            $table->string("party_A");
            $table->string("party_B");
            $table->bigInteger("transaction_type");
            $table->longText("message");
            $table->double("cost")->default(0);
            $table->string("currency")->default("ksh");
            $table->string("purpose");
            $table->double("total_amount");
            $table->string("status");
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
        Schema::dropIfExists('transactions');
    }
}
