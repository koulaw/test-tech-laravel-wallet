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
        Schema::create('recuring_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('wallet_id')->constrained()->cascadeOnDelete();
            $table->string('reason');
            $table->integer('frequency')->unsigned();
            $table->dateTime('start_date');
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->dateTime('end_date')->nullable();
            $table->integer('amount')->unsigned();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recuring_transactions');
    }
};
