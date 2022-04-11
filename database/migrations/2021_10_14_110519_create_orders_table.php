<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('status')->nullable();
            $table->longText('product_id')->nullable();
            $table->string('product_seller_id')->nullable();
            $table->string('type_order')->nullable();
            $table->string('anbar_id')->nullable();
            $table->string('payment')->nullable();
            $table->string('order_number')->nullable();
            $table->string('type_payment')->nullable();
            $table->string('transaction_id')->nullable();
            $table->string('product__color_id')->nullable();
            $table->string('type_send')->default(0); //نوع ارسال
            $table->integer('total_price')->nullable();
            $table->integer('total_discount_price')->nullable();
            $table->integer('address_id')->nullable();
            $table->integer('time_day')->nullable();
            $table->integer('time_month')->nullable();
            $table->integer('time_time')->nullable();
            $table->string('ip')->nullable();
            $table->string('count')->nullable();
            $table->string('product_color')->nullable();
            $table->string('product_vendor')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
