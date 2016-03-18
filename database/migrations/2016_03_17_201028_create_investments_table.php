<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investments', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value');
            $table->integer('quota');
            $table->dateTime('date_payment');
            $table->boolean('status');
            $table->integer('mode');
            $table->integer('client_id');

            $table->foreign('client_id')
                ->references('id')->on('clients')
                ->onDelete('cascade');

            $table->integer('user_id')->unsigned();
            $table->integer('company_id')->unsigned();
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
        Schema::drop('investments');
    }
}
