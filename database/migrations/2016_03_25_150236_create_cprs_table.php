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
            $table->double('value',10,2);
            $table->date('date_maturity');
            $table->date('date_payment');
            $table->char('type');
            $table->char('status');
            $table->string('description');

            $table->integer('client_id')->unsigned();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');

            $table->integer('investment_id')->unsigned();
            $table->foreign('investment_id')->references('id')->on('investments')->onDelete('cascade');

            $table->integer('invoice_id')->unsigned();
            $table->integer('cpr_id')->unsigned();
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
        Schema::drop('cprs');
    }
}
