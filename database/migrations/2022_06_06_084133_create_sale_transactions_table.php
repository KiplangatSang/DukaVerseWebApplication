<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_transactions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('transactionable_id');
            $table->text('transactionable_type');
            $table->longText('transaction_id');
            $table->longText('expense')->default(0);
            // $table->longText('transaction_items')->nullable();
            $table->string('paid_amount')->nullable();
            $table->string('balance')->nullable();
            $table->string('discount')->nullable();
            $table->longText('deductions')->nullable();
            $table->boolean('on_hold')->default(false);
            $table->boolean('pay_status')->default(false);
            $table->boolean('on_credit')->default(false);
            $table->boolean('is_active')->default(false);
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
        Schema::dropIfExists('sale_transactions');
    }
}
