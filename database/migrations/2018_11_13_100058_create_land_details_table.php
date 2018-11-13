<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLandDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('land_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lot_id');
            $table->dateTime('registered_plan')->nullable();
            $table->unsignedInteger('lot_area')->nullable();
            $table->unsignedInteger('street_number')->nullable();
            $table->string('street', 50)->nullable();
            $table->string('suburb', 50)->nullable();
            $table->string('postcode', 4)->nullable();
            $table->string('subdivided_rpsp', 50)->nullable();
            $table->string('subdivided_country', 50)->nullable();
            $table->string('subdivided_parish', 50)->nullable();
            $table->unsignedInteger('original_lot_number')->nullable();
            $table->string('original_rpsp', 50)->nullable();
            $table->string('original_country', 50)->nullable();
            $table->string('original_parish', 50)->nullable();
            $table->unsignedInteger('reconfigured_lot_number')->nullable();
            $table->string('reconfigured_rpsp', 50)->nullable();
            $table->string('reconfigured_country', 50)->nullable();
            $table->string('reconfigured_parish', 50)->nullable();
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
        Schema::dropIfExists('land_details');
    }
}
