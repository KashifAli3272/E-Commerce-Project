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
        Schema::create('payments', function (Blueprint $table) {
            $table->id(); // Primary key
            $table->string('transaction_id')->unique(); // Unique transaction ID // Link to order
            $table->decimal('amount', 10, 2); // Payment amount
            $table->string('payment_method'); // Payment method (easypaisa, jazzcash, etc.)
            $table->string('status')->default('pending'); // Payment status
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
