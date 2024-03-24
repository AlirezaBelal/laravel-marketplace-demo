<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->string('product_id')->nullable();
            $table->string('user_id')->nullable();
            $table->text('review_title')->nullable();
            $table->text('review')->nullable();
            $table->text('plus_rate')->nullable();
            $table->text('plus_min')->nullable();
            $table->text('review_hidden')->nullable();
            $table->string('keyfiat_sakht')->nullable();
            $table->string('arzesh_kharid')->nullable();
            $table->string('noavari')->nullable();
            $table->string('emkanat')->nullable();
            $table->string('sohoolate_estefade')->nullable();
            $table->string('zaher')->nullable();
            $table->string('ok_buy')->nullable();
            $table->string('parent')->nullable();
            $table->string('status')->nullable();
            $table->string('liked')->nullable();
            $table->string('dislike')->nullable();
            $table->string('report')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
