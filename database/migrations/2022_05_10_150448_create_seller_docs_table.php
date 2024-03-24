<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerDocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_docs', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable();
            $table->string('type')->nullable();
            $table->text('img')->nullable();
            $table->string('status')->nullable();
            $table->string('date_expire')->nullable();
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
        Schema::dropIfExists('seller_docs');
    }
}
