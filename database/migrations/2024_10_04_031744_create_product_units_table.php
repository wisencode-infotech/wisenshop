<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductUnitsTable extends Migration
{
    public function up()
    {
        Schema::create('product_units', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique(); // E.g., 'kilogram', 'liter'
            $table->string('short_name')->unique(); // E.g., 'kg', 'L'
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('product_units');
    }
}
