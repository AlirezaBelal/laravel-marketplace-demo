<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryChildAmazingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-child')->create('category_child_amazing', function (Blueprint $table) {
            $table->id();
            $table->string('product_id');
            $table->string('category_id');
            $table->string('subCategory_id');
            $table->string('childCategory_id')->nullable();
            $table->string('status')->default(1);
            $table->integer('property1')->nullable();
            $table->integer('property2')->nullable();
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
        Schema::connection('mysql-child')->dropIfExists('category_child_amazing');
    }
}
