<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retails', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('retailable_id');
            $table-> string('retailable_type');
            $table-> string('retail_Id');
            $table-> string('retail_name');
            $table-> longText('retail_goods');
            $table-> string('retail_town');
            $table-> string('retail_constituency');
            $table-> string('retail_county');
            $table-> longText('retail_profile')->nullable();
            $table-> longText('retail_documents')->nullable();
            $table-> longText('retail_relevant_documents')->nullable();
            $table-> string('retail_emp_no')->nullable();
            $table-> string('retail_stock_est')->nullable();
            $table-> string('retail_subscription')->nullable();
            $table-> string('paymentpreference')->nullable();
            $table-> string('account_details')->nullable();
            $table-> string('complete')->nullable();
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
        Schema::dropIfExists('retails');
    }
}
