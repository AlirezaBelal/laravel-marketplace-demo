<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryChildBannerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::connection('mysql-child')->create('category_child_banner', function (Blueprint $table) {
            $table->id();

            $table->string('img')->nullable();
            $table->string('title');
            $table->string('link');
            $table->string('type')->default(0)->nullable();

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
        Schema::connection('mysql-child')->dropIfExists('category_child_banner');
    }
}
