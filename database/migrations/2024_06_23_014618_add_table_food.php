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
        Schema::create('food', function (Blueprint $table) {
            $table->id('food_id');
            $table->string('food_name');
            $table->text('food_desc');
            $table->unsignedBigInteger('category_id'); // Foreign key ke tabel category
            $table->string('food_img')->nullable(); // Kolom untuk menyimpan nama file gambar (opsional)

            $table->foreign('category_id')->references('category_id')->on('category'); // Menambahkan foreign key constraint
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('food');
    }
};
