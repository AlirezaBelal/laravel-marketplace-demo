<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->integer('type',11)->default(0);
            $table->integer('product_seller_id',11)->nullable();
            $table->string('ip')->nullable();
            $table->string('user_id')->nullable();
            $table->string('product_id');
            $table->string('count')->nullable();
            $table->string('product_price')->nullable();
            $table->string('price_old')->nullable();
            $table->string('product_price_discount_old')->nullable();
            $table->string('product_price_discount')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_vendor')->nullable();
            $table->string('read_cart')->default(0);
            $table->string('view')->default(0);
            $table->string('product_warranty')->nullable();
            $table->string('countryName')->nullable();
            $table->string('regionName')->nullable();
            $table->string('cityName')->nullable();
            $table->string('countryCode')->nullable();
            $table->string('regionCode')->nullable();
            $table->string('zipCode')->nullable();
            $table->string('areaCode')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
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
        Schema::dropIfExists('carts');
    }
}
