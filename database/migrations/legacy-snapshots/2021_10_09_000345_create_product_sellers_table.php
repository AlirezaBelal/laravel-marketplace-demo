<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_sellers', function (Blueprint $table) {
            $table->id();

            $table->integer('vendor_id')->nullable();
            $table->integer('product_id')->nullable();
            $table->string('time');
            $table->string('warranty_id');
            $table->string('price');
            $table->string('discount_price');
            $table->string('color_id');
            $table->string('product_count');
            $table->string('limit_order');
            $table->string('status');

            $table->softDeletes();
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
        Schema::dropIfExists('product_sellers');
    }
}
