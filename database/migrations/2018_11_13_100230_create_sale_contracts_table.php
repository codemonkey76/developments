<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaleContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lot_id');
            $table->string('email', 50)->nullable();
            $table->dateTime('contract_date')->nullable();
            $table->string('buyer_name', 100)->nullable();
            $table->string('buyer_abn', 11)->nullable();
            $table->string('buyer_street_address', 50)->nullable();
            $table->string('buyer_suburb', 50)->nullable();
            $table->string('buyer_country', 50)->default('AUSTRALIA')->nullable();
            $table->string('buyer_postcode', 4)->nullable();
            $table->string('buyer_phone', 15)->nullable();
            $table->string('solicitor', 50)->nullable();
            $table->string('solicitor_address', 50)->nullable();
            $table->string('solicitor_suburb', 50)->nullable();
            $table->string('solicitor_postcode', 4)->nullable();
            $table->string('solicitor_phone', 15)->nullable();
            $table->string('solicitor_fax', 15)->nullable();
            $table->decimal('purchase_price')->nullable();
            $table->decimal('deposit')->nullable();
            $table->decimal('initial_deposit')->nullable();
            $table->decimal('outstanding_deposit')->nullable();
            $table->dateTime('settlement_date_expected')->nullable();
            $table->dateTime('settlement_date_actual')->nullable();
            $table->boolean('finance_approved')->default(false);
            $table->dateTime('finance_approved_date')->nullable();
            $table->string('number_extensions', 255)->nullable();
            $table->dateTime('finance_expected')->nullable();
            $table->boolean('section_1_to_4')->default(false);
            $table->boolean('section_5')->default(false);
            $table->boolean('section_6')->default(false);
            $table->boolean('section_7')->default(false);
            $table->boolean('section_8')->default(false);
            $table->boolean('section_9')->default(false);
            $table->boolean('section_10')->default(false);
            $table->boolean('section_11')->default(false);
            $table->boolean('section_12')->default(false);
            $table->boolean('section_13')->default(false);
            $table->boolean('section_14')->default(false);
            $table->boolean('section_15')->default(false);
            $table->boolean('section_16')->default(false);
            $table->boolean('section_17')->default(false);
            $table->boolean('section_18')->default(false);
            $table->boolean('section_19')->default(false);
            $table->boolean('section_20')->default(false);
            $table->boolean('section_21')->default(false);
            $table->boolean('section_22')->default(false);
            $table->boolean('section_23')->default(false);
            $table->boolean('section_24')->default(false);
            $table->boolean('section_25')->default(false);
            $table->boolean('section_26')->default(false);
            $table->boolean('section_27')->default(false);
            $table->boolean('section_28')->default(false);
            $table->boolean('section_29')->default(false);
            $table->boolean('section_30')->default(false);
            $table->boolean('section_31')->default(false);
            $table->boolean('section_32')->default(false);
            $table->boolean('section_33')->default(false);
            $table->boolean('section_34')->default(false);
            $table->boolean('section_35')->default(false);
            $table->boolean('section_36')->default(false);
            $table->boolean('section_37')->default(false);
            $table->boolean('section_38')->default(false);
            $table->boolean('section_39')->default(false);
            $table->dateTime('last_update')->nullable();
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
        Schema::dropIfExists('sale_contracts');
    }
}
