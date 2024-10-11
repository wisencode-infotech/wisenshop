<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            
            $table->string('title');
            $table->text('message');
            $table->string('url')->nullable();
            
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('cascade');
            
            $table->boolean('is_read')->default(false);
            $table->string('type')->nullable();
            $table->boolean('is_global')->default(false);
            
            $table->json('meta_data')->nullable();
            
            $table->timestamps();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->index('user_id');
            $table->index('is_read');
            $table->index('is_global');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notifications');
    }
}
