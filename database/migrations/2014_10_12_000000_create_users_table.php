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
        /**
         *isOwner
         * isEmployee = detemines if an account belongs to a retail employee
         * isAdmin = determines if a user is a dukaverse employee
         * role = 0 belongs to Dukaverse admin
         * 1 belongs to retail owners and their employees
         * 2 belongs to suppliers
         * isSuspended = determines if account has been suspended from use
         * api_token = this is the api token used in api calling
         */
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phoneno');
            $table->string('terms_and_conditions')->default(true);
            $table->unsignedBigInteger('userpin')->nullable()->default(null);
            $table->boolean('is_owner')->default(true);
            $table->boolean('is_employee')->default(false);
            $table->boolean('is_admin')->default(false);
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
