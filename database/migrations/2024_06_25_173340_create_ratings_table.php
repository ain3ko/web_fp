<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id'); // Foreign key to recipe
            $table->decimal('rating', 3, 2);
            $table->timestamps(); // Optional

            // Add a foreign key constraint
            $table->foreign('recipe_id')->references('recipe_id')->on('recipe')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('ratings');
    }
};
