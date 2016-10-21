<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->index();
            $table->string('description')->nullable();
            $table->double('rate');
            $table->string('rate_mode');
            $table->double('total');
            $table->integer('quota');
            $table->boolean('active')->default(true);
            $table->date('opportunity');

            $table->integer('prospect_id')->unsigned();
            $table->foreign('prospect_id')->references('id')->on('prospects')->onDelete('cascade');

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
        Schema::drop('bonds');
    }
}
