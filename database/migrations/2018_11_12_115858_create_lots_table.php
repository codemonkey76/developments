<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lots', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('stage_id')->nullable();
            $table->unsignedInteger('lot_number')->nullable();
            $table->dateTime('sc_contract_date')->nullable();
            $table->string('sc_buyer_name', 100)->nullable();
            $table->string('sc_buyer_abn', 11)->nullable();
            $table->string('sc_buyer_street_address', 50)->nullable();
            $table->string('sc_buyer_suburb', 50)->nullable();
            $table->string('sc_buyer_country', 50)->default('AUSTRALIA')->nullable();
            $table->string('sc_buyer_postcode', 4)->nullable();
            $table->string('sc_buyer_phone', 15)->nullable();
            $table->string('sc_solicitor', 50)->nullable();
            $table->string('sc_solicitor_address', 50)->nullable();
            $table->string('sc_solicitor_suburb', 50)->nullable();
            $table->string('sc_solicitor_postcode', 4)->nullable();
            $table->string('sc_solicitor_phone', 15)->nullable();
            $table->string('sc_solicitor_fax', 15)->nullable();
            $table->decimal('sc_purchase_price')->nullable();
            $table->decimal('sc_deposit')->nullable();
            $table->decimal('sc_initial_deposit')->nullable();
            $table->decimal('sc_outstanding_deposit')->nullable();
            $table->dateTime('sc_settlement_date_expected')->nullable();
            $table->dateTime('sc_settlement_date_actual')->nullable();
            $table->boolean('sc_finance_approved')->default(false);
            $table->dateTime('sc_finance_approved_date')->nullable();
            $table->string('sc_number_extensions', 255)->nullable();
            $table->dateTime('sc_finance_expected')->nullable();
            $table->boolean('sc_section_1_to_4')->default(false);
            $table->boolean('sc_section_5')->default(false);
            $table->boolean('sc_section_6')->default(false);
            $table->boolean('sc_section_7')->default(false);
            $table->boolean('sc_section_8')->default(false);
            $table->boolean('sc_section_9')->default(false);
            $table->boolean('sc_section_10')->default(false);
            $table->boolean('sc_section_11')->default(false);
            $table->boolean('sc_section_12')->default(false);
            $table->boolean('sc_section_13')->default(false);
            $table->boolean('sc_section_14')->default(false);
            $table->boolean('sc_section_15')->default(false);
            $table->boolean('sc_section_16')->default(false);
            $table->boolean('sc_section_17')->default(false);
            $table->boolean('sc_section_18')->default(false);
            $table->boolean('sc_section_19')->default(false);
            $table->boolean('sc_section_20')->default(false);
            $table->boolean('sc_section_21')->default(false);
            $table->boolean('sc_section_22')->default(false);
            $table->boolean('sc_section_23')->default(false);
            $table->boolean('sc_section_24')->default(false);
            $table->boolean('sc_section_25')->default(false);
            $table->boolean('sc_section_26')->default(false);
            $table->boolean('sc_section_27')->default(false);
            $table->boolean('sc_section_28')->default(false);
            $table->boolean('sc_section_29')->default(false);
            $table->boolean('sc_section_30')->default(false);
            $table->boolean('sc_section_31')->default(false);
            $table->boolean('sc_section_32')->default(false);
            $table->boolean('sc_section_33')->default(false);
            $table->boolean('sc_section_34')->default(false);
            $table->boolean('sc_section_35')->default(false);
            $table->boolean('sc_section_36')->default(false);
            $table->boolean('sc_section_37')->default(false);
            $table->boolean('sc_section_38')->default(false);
            $table->boolean('sc_section_39')->default(false);
            $table->dateTime('sc_last_update')->nullable();
            $table->dateTime('ld_registered_plan')->nullable();
            $table->unsignedInteger('ld_lot_number')->nullable();
            $table->unsignedInteger('ld_street_number')->nullable();
            $table->string('ld_street', 50)->nullable();
            $table->string('ld_suburb', 50)->nullable();
            $table->string('ld_postcode', 4)->nullable();
            $table->string('ld_subdivided_rpsp', 50)->nullable();
            $table->string('ld_subdivided_country', 50)->nullable();
            $table->string('ld_subdivided_parish', 50)->nullable();
            $table->unsignedInteger('ld_original_lot_number')->nullable();
            $table->string('ld_original_rpsp', 50)->nullable();
            $table->string('ld_original_country', 50)->nullable();
            $table->string('ld_original_parish', 50)->nullable();
            $table->unsignedInteger('ld_reconfigured_lot_number')->nullable();
            $table->string('ld_reconfigured_rpsp', 50)->nullable();
            $table->string('ld_reconfigured_country', 50)->nullable();
            $table->string('ld_reconfigured_parish', 50)->nullable();
            $table->dateTime('bd_date_of_possession')->nullable();
            $table->dateTime('bd_original_settlement_date')->nullable();
            $table->dateTime('bd_base_stage_completion_date')->nullable();
            $table->dateTime('bd_building_completion_date')->nullable();
            $table->dateTime('bd_settlement_completed')->nullable();
            $table->dateTime('bd_settlement_completed')->nullable();
            $table->string('bd_comments', 250)->nullable();
            $table->boolean('bp_plans_submitted')->default(false);
            $table->boolean('bp_plans_approved')->default(false);
            $table->boolean('bp_builder_name')->default(false);
            $table->string('bp_builder_phone', 15)->nullable();
            $table->string('bp_house_levels', 50)->nullable();
            $table->string('bp_total_area', 50)->nullable();
            $table->string('bp_roof_cladding', 50)->nullable();
            $table->string('bp_external_walls', 50)->nullable();
            $table->string('bp_comments', 250)->nullable();
            $table->string('sc_email', 50)->nullable();
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
        Schema::dropIfExists('lots');
    }
}
