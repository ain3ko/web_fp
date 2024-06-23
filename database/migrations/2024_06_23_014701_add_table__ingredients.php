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
        Schema::create('ingredients', function (Blueprint $table) {
            $table->id('ingredient_id');
            $table->string('ingredient_1')->nullable();
            $table->string('ingredient_2')->nullable();
            $table->string('ingredient_3')->nullable();
            $table->string('ingredient_4')->nullable();
            $table->string('ingredient_5')->nullable();
            $table->string('ingredient_6')->nullable();
            $table->string('ingredient_7')->nullable();
            $table->string('ingredient_8')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingredients');
    }
};
