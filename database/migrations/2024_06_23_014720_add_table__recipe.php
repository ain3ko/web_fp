<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('recipe', function (Blueprint $table) {
            $table->id('recipe_id');
            $table->unsignedBigInteger('food_id'); // Foreign key ke tabel food
            $table->unsignedBigInteger('ingredient_id'); // Foreign key ke tabel ingredients
            $table->unsignedBigInteger('step_id'); // Foreign key ke tabel steps

            $table->foreign('food_id')->references('food_id')->on('food');
            $table->foreign('ingredient_id')->references('ingredient_id')->on('ingredients');
            $table->foreign('step_id')->references('step_id')->on('steps');
        });
    }

    public function down()
    {
        Schema::dropIfExists('recipe');
    }
};
