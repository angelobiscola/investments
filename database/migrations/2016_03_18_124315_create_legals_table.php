<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLegalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('legals', function (Blueprint $table) {
            $table->increments('id');
            $table->string('company_name')->unique()->index();
            $table->string('cnpj')->unique();
            $table->string('cnae_principal');
            $table->string('cnae_secundary');
            $table->string('site')->nullable();

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients') ->onDelete('cascade');

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
        Schema::drop('legals');
    }
}
