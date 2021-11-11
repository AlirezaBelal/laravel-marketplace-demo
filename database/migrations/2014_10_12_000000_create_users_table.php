<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            //اطلاعات حقیقی
            $table->string('img')->nullable();
            $table->string('name')->nullable();
            $table->string('mobile')->nullable();
            $table->string('national_code')->nullable();
            $table->string('email')->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('birthday')->nullable();
            $table->string('job')->nullable();
            $table->string('money_back')->nullable();
            $table->string('newsletter')->default(0);
            //اطلاعات حقوقی
            $table->string('name_company')->nullable();
            $table->string('national_code_company')->nullable();
            $table->string('code_company')->nullable();
            $table->string('sabt_company')->nullable();
            $table->string('state_company')->nullable();
            $table->string('city_company')->nullable();
            $table->string('phone_company')->nullable();
            $table->string('wallet')->default(0);
            $table->string('password')->nullable();
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
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
        Schema::dropIfExists('users');
    }
}
