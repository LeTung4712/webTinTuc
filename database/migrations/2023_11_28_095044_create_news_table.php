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
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title', 255);
            $table->string('unsigned_title', 255);
            $table->string('description', 255);
            $table->longtext('content');
            $table->string('image', 255);
            $table->string('author',50);
            $table->integer('trending');
            $table->integer('view');    
            $table->foreignId('news_type_id')->constrained('news_types');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('news');
    }
};
