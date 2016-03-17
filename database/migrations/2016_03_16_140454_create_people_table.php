<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();;
            $table->string('representation')->default(' ');
            $table->string('nationality')->default('Brasil');
            $table->string('marital_status');
            $table->string('birth_date');
            $table->string('profession');
            $table->string('identity');
            $table->string('organ_issuer');
            $table->string('cpf')->unique();;
            $table->string('phone');
            $table->string('cell_phone');
            $table->string('email')->unique();
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
        Schema::drop('people');
    }
}
