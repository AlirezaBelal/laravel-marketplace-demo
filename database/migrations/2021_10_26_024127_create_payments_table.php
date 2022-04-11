<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->nullable();
            $table->string('transactionId')->nullable();
            $table->string('driver')->nullable();
            $table->string('order_id')->nullable();
            $table->string('order_number')->nullable();
            $table->string('time_id')->nullable();
            $table->string('total_price')->nullable();
            $table->string('shipping_price')->nullable();
            $table->string('type_payment')->default('1')->nullable();
            $table->string('discount_code')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('gift_code')->nullable();
            $table->string('gift_code_price')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
