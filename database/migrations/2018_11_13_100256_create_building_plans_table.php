<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildingPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('building_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lot_id');
            $table->boolean('plans_submitted')->default(false);
            $table->boolean('plans_approved')->default(false);
            $table->boolean('builder_name')->default(false);
            $table->string('builder_phone', 15)->nullable();
            $table->string('house_levels', 50)->nullable();
            $table->string('total_area', 50)->nullable();
            $table->string('roof_cladding', 50)->nullable();
            $table->string('external_walls', 50)->nullable();
            $table->string('comments', 250)->nullable();
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
        Schema::dropIfExists('building_plans');
    }
}
