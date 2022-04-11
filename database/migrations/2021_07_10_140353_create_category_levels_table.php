<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryLevelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_levels', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('subCategory_id')->nullable();
            $table->string('childCategory_id')->nullable();
            $table->string('categorylevel4_id')->nullable();
            $table->integer('property')->nullable();
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
        Schema::dropIfExists('category_levels');
    }
}
