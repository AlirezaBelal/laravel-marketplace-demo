<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->integer('vendor_id')->nullable();
            $table->string('img')->nullable();
            $table->string('title');
            $table->string('name');
            $table->string('link');
            $table->string('category_id')->nullable();
            $table->string('subcategory_id')->nullable();
            $table->string('childcategory_id')->nullable();
            $table->string('categorylevel4_id')->nullable();
            $table->string('color_id')->nullable();
            $table->string('brand_id')->nullable();
            $table->string('tags')->nullable();
            $table->text('body')->nullable();
            $table->text('description')->nullable();
            $table->string('price')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('number')->nullable();
            $table->string('weight')->nullable();
            $table->string('status_product')->nullable();
            $table->string('publish_product')->nullable();
            $table->integer('view')->nullable();
            $table->integer('gift')->nullable();
            $table->integer('shipment')->nullable();
            $table->integer('original')->default(1);
            $table->integer('order_count')->default(0);
            $table->integer('special')->default(0);

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
        Schema::dropIfExists('products');
    }
}
