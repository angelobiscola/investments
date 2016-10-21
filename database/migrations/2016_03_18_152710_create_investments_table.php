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
            $table->double('value',10,2);
            $table->date('date_payment');
            $table->boolean('status');
            $table->integer('mode'); // 0 : simples, 1 = composto
            $table->boolean('documents')->default(false);

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients') ->onDelete('cascade');

            $table->integer('bond_id')->unsigned();
            $table->foreign('bond_id')->references('id')->on('bonds')->onDelete('cascade');

            $table->integer('company_id')->unsigned();
            $table->integer('user_id')->unsigned();
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
