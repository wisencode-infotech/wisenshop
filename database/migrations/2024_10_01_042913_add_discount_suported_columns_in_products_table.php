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
        Schema::table('products', function (Blueprint $table) {
            $table->enum('discount_type', ['percentage', 'amount'])->nullable()->after('category_id');  // discount type (percentage or amount)
            $table->decimal('discount_value', 8, 2)->nullable()->after('discount_type');                // discount value
            $table->datetime('discount_start_date')->nullable()->after('discount_value');               // start date of the discount
            $table->datetime('discount_end_date')->nullable()->after('discount_start_date');            // end date of the discount
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn(['discount_type', 'discount_value', 'discount_start_date', 'discount_end_date']);
        });
    }
};
