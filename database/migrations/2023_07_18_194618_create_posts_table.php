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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('slug');
            $table->text('extract')->nullable();
            $table->longText('body')->nullable();
            $table->boolean('active')->default(true);
            $table->date('published_date');

            $table->foreignId('category_id')->references('id')->on('categories');
            $table->foreignId('user_id')->references('id')->on('users');
            $table->foreignId('user_update')->references('id')->on('users');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
