<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->integer("accountable_id");
            $table->string("accountable_type");
            $table->longText("account");
            $table->longText("account_ref");
            $table->double("balance")->default(0);
            $table->string("last_balance")->nullable();
            $table->string("on_hold")->nullable();;
            $table->string("initial_deposit")->nullable();;
            $table->double("max_amount")->nullable();
            $table->double("min_amount")->nullable();;
            $table->string("account_status")->default(true);
            $table->string("is_active")->default(false);
            $table->string("account_type")->default("business");
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
        Schema::dropIfExists('accounts');
    }
}
