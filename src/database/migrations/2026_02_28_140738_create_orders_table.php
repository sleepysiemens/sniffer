<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignId('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->string('status')->default('created');
            $table->string('delivery_type')->default('pickup');
            $table->string('delivery_info');
            $table->string('payment_type')->default('cash');
            $table->boolean('is_payed')->default(false);
            $table->timestamps();
            $table->dateTime('delivered_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
