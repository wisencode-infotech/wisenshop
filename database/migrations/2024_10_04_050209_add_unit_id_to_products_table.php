<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUnitIdToProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            // Add the unit_id column and set it as a foreign key
            $table->unsignedBigInteger('unit_id')->nullable()->after('discount_end_date');
            
            // If you have a product_units table for reference
            $table->foreign('unit_id')->references('id')->on('product_units')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key constraint and the column
            $table->dropForeign(['unit_id']);
            $table->dropColumn('unit_id');
        });
    }
}