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
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_location')->nullable();
            $table->unsignedBigInteger('id_category')->nullable();
            $table->string('title')->nullable();
            $table->string('writer')->nullable();
            $table->string('publisher')->nullable();
            $table->date('publish_year')->nullable();
            $table->string('description')->nullable();
            $table->integer('stock')->nullable();
            $table->timestamps();
            // $table->foreignId('id_location')->references('id')->on('locations')->onDelete('cascade');
            // $table->foreignId('id_category')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
