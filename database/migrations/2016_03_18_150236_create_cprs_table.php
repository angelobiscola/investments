<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCprsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cprs', function (Blueprint $table) {
            $table->increments('id');
            $table->double('value');
            $table->dateTime('date_maturity');
            $table->dateTime('date_payment');
            $table->char('type');
            $table->char('status');
            $table->string('description');
            $table->integer('client_id');
            $table->integer('company_id');
            $table->integer('investment_id');
            $table->integer('invoice_id')->unsigned();
            $table->integer('cpr_id');
            $table->interger('user_id')->unsigned();
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
        Schema::drop('cprs');
    }
}
