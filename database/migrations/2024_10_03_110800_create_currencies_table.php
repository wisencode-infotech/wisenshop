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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('name'); // Currency name (e.g., US Dollar)
            $table->string('code', 3); // ISO 4217 currency code (e.g., USD)
            $table->string('symbol', 10); // Currency symbol (e.g., $)
            $table->decimal('exchange_rate', 15, 8)->default(1); // Exchange rate compared to base currency
            $table->boolean('active')->default(true); // Status of currency
            $table->timestamps(); // Created_at and updated_at columns
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currencies');
    }
};
