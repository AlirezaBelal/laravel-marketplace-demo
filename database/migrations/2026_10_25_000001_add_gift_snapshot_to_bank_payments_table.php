<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('bank_payments', function (Blueprint $table): void {
            $table->string('gift_code')->nullable();
            $table->unsignedBigInteger('gift_applied')->default(0);
            $table->string('gateway_reference')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('bank_payments', function (Blueprint $table): void {
            $table->dropColumn(['gift_code', 'gift_applied', 'gateway_reference']);
        });
    }
};
