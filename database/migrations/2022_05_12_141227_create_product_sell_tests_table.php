<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSellTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sell_tests', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('seller_id')->nullable();
            $table->string('cat_id')->nullable();
            $table->string('cat2_id')->nullable();
            $table->string('cat3_id')->nullable();
            $table->string('cat4_id')->nullable();
            $table->string('cat5_id')->nullable();
            $table->string('original')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('type')->nullable();
            $table->string('category_id_for_product')->nullable();
            $table->string('start_location')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('weight')->nullable();
            $table->string('length')->nullable();
            $table->string('detail_product')->nullable();
            $table->string('plus_product')->nullable();
            $table->string('minus_product')->nullable();
            $table->string('title_offer')->nullable();
            $table->string('img')->nullable();
            $table->string('title')->nullable();
            $table->string('ename')->nullable();
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
        Schema::dropIfExists('product_sell_tests');
    }
}
