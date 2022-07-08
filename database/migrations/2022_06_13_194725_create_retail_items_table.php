<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRetailItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('retail_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('itemable_id');
            $table->string('itemable_type');
            $table->string('name');
            $table->string('brand');
            $table->string('size');
            $table->longText('image');
            $table->double('selling_price');
            $table->unsignedBigInteger('buying_price');
            $table->longText('description')->nullable();
            $table->longText('regulation')->nullable();
            $table->string('suppliers_id')->nullable();
            $table->boolean('is_required')->nullable()->default(false);
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
        Schema::dropIfExists('retail_items');
    }
}
