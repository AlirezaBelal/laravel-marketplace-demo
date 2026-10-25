<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSettingFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting_footers', function (Blueprint $table) {
            $table->id();

            $table->text('footer_feature-innerbox')->nullable();
            $table->text('footer_top_social_link')->nullable();
            $table->text('footer_top_middlebar_link_col1')->nullable();
            $table->text('footer_top_middlebar_link_col1_ul')->nullable();
            $table->text('footer_top_middlebar_link_col2')->nullable();
            $table->text('footer_top_middlebar_link_col2_ul')->nullable();
            $table->text('footer_top_middlebar_link_col3_ul')->nullable();

            $table->text('footer_top_address_contact1')->nullable();
            $table->text('footer_top_address_contact2')->nullable();
            $table->text('footer_top_address_contact3')->nullable();
            $table->text('footer_top_address_images_appstore')->nullable();
            $table->text('footer_top_address_images_cafebazar')->nullable();
            $table->text('footer_top_address_images_miket')->nullable();
            $table->text('footer_top_address_images_sibapp')->nullable();

            $table->text('footer_more_info_title')->nullable();
            $table->text('footer_more_info_description')->nullable();
            $table->text('footer_more_info_category')->nullable();
            $table->text('footer_more_info_safety-partner1')->nullable();
            $table->text('footer_more_info_safety-partner2')->nullable();
            $table->text('footer_more_info_safety-partner3')->nullable();
            $table->text('footer_more_info_brand')->nullable();
            $table->text('footer_more_info_copyright')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('setting_footers');
    }
}
