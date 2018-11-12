<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBuildersTermsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('builders_terms', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lot_id');
            $table->dateTime('date_of_possession')->nullable();
            $table->dateTime('original_settlement_date')->nullable();
            $table->dateTime('base_stage_completion_due_by')->nullable();
            $table->dateTime('building_completion_due_by')->nullable();
            $table->dateTime('settlement_expected')->nullable();
            $table->dateTime('settlement_actual')->nullable();
            $table->text('comments')->nullable();
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
        Schema::dropIfExists('builders_terms');
    }
}
