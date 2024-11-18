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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('short_description')->nullable();
            $table->text('description')->nullable();
            $table->decimal('price', 8, 2);
            $table->integer('stock')->nullable();
            $table->boolean('status')->default(1);
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('unit_id')->nullable()->constrained('product_units')->onDelete('cascade');
            $table->enum('discount_type', ['percentage', 'amount'])->nullable();
            $table->decimal('discount_value', 8, 2)->nullable();
            $table->datetime('discount_start_date')->nullable();
            $table->datetime('discount_end_date')->nullable();

            $table->char('public_visibility', 2)->default('1');
            $table->char('is_home', 2)->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
