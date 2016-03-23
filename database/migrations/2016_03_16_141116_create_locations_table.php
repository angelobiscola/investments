<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('address')->index();
            $table->string('number');
            $table->string('city');
            $table->string('zip_code')->index();
            $table->string('district')->index();
            $table->string('state')->nullable();
            $table->string('state_abbr');
            $table->integer('locationable_id');
            $table->string('locationable_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('locations');
    }
}
