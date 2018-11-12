<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resales', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lot_id');
            $table->boolean('for_sale')->default(false);
            $table->string('buyer_name', 50)->nullable();
            $table->string('buyer_address', 50)->nullable();
            $table->string('buyer_suburb', 50)->nullable();
            $table->string('buyer_postcode', 4)->nullable();
            $table->string('real_estate', 50)->nullable();
            $table->string('real_estate_address', 50)->nullable();
            $table->string('real_estate_suburb', 50)->nullable();
            $table->string('real_estate_postcode', 4)->nullable();
            $table->string('real_estate_phone', 15)->nullable();
            $table->string('real_estate_fax', 15)->nullable();
            $table->string('solicitor', 50)->nullable();
            $table->string('solicitor_address', 50)->nullable();
            $table->string('solicitor_suburb', 50)->nullable();
            $table->string('solicitor_postcode', 4)->nullable();
            $table->string('solicitor_phone', 15)->nullable();
            $table->string('solicitor_fax', 15)->nullable();
            $table->dateTime('deed_poll_expected_by_date')->nullable();
            $table->boolean('deed_poll')->nullable();
            $table->dateTime('deed_poll_date')->nullable();
            $table->unsignedInteger('sale_type')->nullable();
            $table->unsignedInteger('resale_num')->nullable();


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
        Schema::dropIfExists('resales');
    }
}
