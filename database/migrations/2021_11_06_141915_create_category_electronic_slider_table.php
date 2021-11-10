<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryElectronicSliderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-electronic')->create('category_electronic_slider', function (Blueprint $table) {
            $table->id();

            $table->string('img')->nullable();
            $table->string('title');
            $table->string('link');
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
        Schema::connection('mysql-electronic')->dropIfExists('category_electronic_slider');
    }
}
