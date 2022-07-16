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
        /**
         * trans_id = string used to identify transaction
         * amount = amount involved in the transaction
         * gateway = channel used to fulfil the transaction
         * accounts_id = index used to get the user account making the transaction
         * party_A = the party account details used to make  transaction ie mpesa it will be a phone number or till
         * party_B= the party account details used to receive the  transaction ie mpesa it will be a phone number or till
         * transaction_type= 1=>internal within dukaverse accounts
         *                   2=>external outside the dukaverse accounts
         *                   3=>external and the money is not involded with dukaverse ie cash payments(just to help keep track)
         * message = message tied up with sending the transaction
         *cost = cost involved in the transaction( internal only to dukaverse. outside expenses are not accounted for)
         *currency = currency involved in the transaction ie ksh
         *purpose = purpose of the transaction ie SALES, LOANS
         *total_amount total amount involved in the transaction ie cost summed to amount sent
         *status =  status of transaction if true=> success false=> failed
         */
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string("trans_id");
            $table->integer("transactionable_id");
            $table->string("transactionable_type");
            $table->string("amount");
            $table->string("gateway");
            $table->bigInteger("accounts_id")->nullable();
            $table->string("party_A")->nullable();
            $table->string("party_B")->nullable();
            $table->bigInteger("transaction_type");
            $table->longText("message");
            $table->double("cost")->default(0);
            $table->string("currency")->default("ksh");
            $table->string("purpose");
            $table->double("total_amount");
            $table->boolean("status");
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
