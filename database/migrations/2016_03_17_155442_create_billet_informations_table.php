<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilletInformationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billet_informations', function (Blueprint $table) {

            $table->increments('id');
            $table->integer('agencia');
            $table->integer('agencia_dv');
            $table->integer('conta');
            $table->integer('conta_dv');
            $table->integer('carteira');
            $table->string('identificacao');
            $table->integer('contrato');
            $table->integer('billet_id');
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
        Schema::drop('billet_informations');
    }
}
