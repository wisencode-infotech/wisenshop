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
        Schema::create('shipping_methods', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Name of the shipping method (e.g., Standard Shipping, Express Shipping)
            $table->string('description')->nullable(); // Short description of the shipping method
            $table->decimal('price', 10, 2); // Shipping cost
            $table->string('delivery_time')->nullable(); // Estimated delivery time (e.g., 3-5 business days)
            $table->boolean('is_active')->default(true); // Whether the shipping method is active
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipping_methods');
    }
};
