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
            $table->integer('agency');
            $table->integer('agency_dv');
            $table->integer('account');
            $table->integer('account_dv');
            $table->integer('wallet');
            $table->string('identification');
            $table->integer('contract');
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
