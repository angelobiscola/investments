<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePhysicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physicals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nationality')->default('Brasil');
            $table->string('marital_status');
            $table->string('birth_date');
            $table->string('profession');
            $table->string('identity');
            $table->string('organ_issuer');
            $table->string('cpf')->unique()->index();
            $table->string('cell_phone');
            $table->integer('client_id')->unsigned();

            //$table->foreign('client_id')
            //    ->references('id')->on('clients')
            //    ->onDelete('cascade');

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
        Schema::drop('physicals');
    }
}
