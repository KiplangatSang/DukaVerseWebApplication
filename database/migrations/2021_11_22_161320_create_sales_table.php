<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table-> bigInteger('retailsaleable_id');
            $table-> string('retailsaleable_type');
            $table-> string('itemNameId');
            $table-> longText('itemImage');
            $table-> string('itemName');
            $table-> string('itemSize');
            $table-> unsignedBigInteger('itemAmount');
            $table-> boolean('onCredit')->default(false);
            $table-> double('price');
            $table-> unsignedBigInteger('employees_id')->nullable();
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
        Schema::dropIfExists('sales');
    }
}
