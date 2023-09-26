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
        Schema::create('table_article_category', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('article_id'); // Clave foránea
            $table->unsignedBigInteger('category_id'); // Clave foránea
            $table->timestamps();

            // Relación muchos a muchos con las tablas 'articles' y 'categories'
            $table->foreign('article_id')->references('id')->on('articles');
            $table->foreign('category_id')->references('id')->on('categories');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_article_category');
    }
};
