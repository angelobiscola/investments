<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBilletsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('billets', function (Blueprint $table) {

            $table->increments('id');
            $table->string('name');
            $table->string('template');
            $table->integer('agency');
            $table->integer('agency_dv');
            $table->integer('account');
            $table->integer('account_dv');
            $table->integer('wallet');
            $table->string('identification');
            $table->integer('contract');
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
        Schema::drop('billets');
    }
}
