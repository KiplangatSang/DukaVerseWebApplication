<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneno');
            $table->string('terms_and_conditions')->nullable();
            $table-> unsignedBigInteger('userpin')->nullable()->default(1234);
            $table-> boolean('isOwner')->default(false);
            $table-> boolean('isEmployee')->default(true);
            $table->boolean('isAdmin')->default(false);
            $table->integer('role')->default(1);
            $table->boolean('isSuspended')->default(false);
            $table->string('api_token');
            $table->string('month');
            $table->integer('year');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
