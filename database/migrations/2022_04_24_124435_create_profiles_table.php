<?php

use App\Repositories\AppRepository;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */

    public function up()
    {


        Schema::create('Profiles', function (Blueprint $table) {
            $apprepo = new AppRepository();
            $noprofile = $apprepo->getBaseImages()['noprofile'];

            $table->id();
            $table->string('user_id');
            $table->string('full_name')->nullable();
            $table->longText('profile_image')->default($noprofile);
            $table->string('national_id')->nullable();
            $table->string('relevant_documents')->nullable();
            $table->string('kra')->nullable();
            $table->string('alternate_phone_no')->nullable();
            $table->string('address')->nullable();
            $table->string('country')->nullable();
            $table->string('county')->nullable();
            $table->string('sub_county')->nullable();
            $table->string('town')->nullable();
            $table->string('street')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
