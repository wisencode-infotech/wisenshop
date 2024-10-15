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
        Schema::create('franchise_affiliate_payouts', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount', 11, 2);
            $table->foreignId('user_id')->comment('for_franchise_users')->constrained('users')->onDelete('cascade');
            $table->string('iban')->nullable();
            $table->string('status')->nullable()->default('pending');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchise_affiliate_payouts');
    }
};
