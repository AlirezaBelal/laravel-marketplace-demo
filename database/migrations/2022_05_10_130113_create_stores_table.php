<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->integer('personal')->nullable()->default(1);
            $table->integer('user_id')->nullable();
            $table->integer('store_back')->nullable()->default(0);
            $table->string('store_name')->nullable();
            $table->string('store_state')->nullable();
            $table->string('store_city')->nullable();
            $table->text('store_address')->nullable();
            $table->string('store_code')->nullable();
            $table->string('store_telephone')->nullable();
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
        Schema::dropIfExists('stores');
    }
}
