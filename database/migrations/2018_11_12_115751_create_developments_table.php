<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDevelopmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('development', 50)->nullable();
            $table->string('company', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('company_contact', 100)->nullable();
            $table->string('sales_office', 255)->nullable();
            $table->string('sales_contact', 100)->nullable();
            $table->string('development_name', 100)->nullable();
            $table->string('web_address', 50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('developments');
    }
}
