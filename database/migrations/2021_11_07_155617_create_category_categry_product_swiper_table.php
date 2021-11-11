<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryCategryProductSwiperTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-category')->create('category_product_swiper', function (Blueprint $table) {
            $table->id();

            $table->string('c_id')->nullable();
            $table->string('title_id');
            $table->string('product_id');
            $table->string('category_id');
            $table->string('subCategory_id');
            $table->string('childCategory_id')->nullable();
            $table->string('status')->default(1);

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
        Schema::connection('mysql-category')->dropIfExists('category_product_swiper');
    }
}
