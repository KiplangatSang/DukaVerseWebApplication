<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequiredItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('required_items', function (Blueprint $table) {
            $table->id();
            $table-> string('requiredItemId');
            $table-> string('requiredItem');
            $table-> int('requiredAmount');
            $table-> double('projectedCost');
            $table-> string('requiredStatus');
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
        Schema::dropIfExists('required_items');
    }
}
