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
        Schema::create('steps', function (Blueprint $table) {
            $table->id('step_id');
            $table->text('step_1')->nullable();
            $table->text('step_2')->nullable();
            $table->text('step_3')->nullable();
            $table->text('step_4')->nullable();
            $table->text('step_5')->nullable();
            $table->text('step_6')->nullable();
            $table->text('step_7')->nullable();
            $table->text('step_8')->nullable();
        });
    }

    public function down()
    {
        Schema::dropIfExists('steps');
    }
};
