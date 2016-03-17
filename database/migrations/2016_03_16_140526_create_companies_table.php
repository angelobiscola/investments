<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->integer('id')->unique();
            $table->string('name')->unique();;
            $table->string('company_name')->unique();
            $table->string('cnpj')->unique();
            $table->string('cnae_principal');
            $table->string('phone');
            $table->string('email')->unique();
            $table->integer('people_id');
            $table->boolean('master');
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
        Schema::drop('companies');
    }
}
