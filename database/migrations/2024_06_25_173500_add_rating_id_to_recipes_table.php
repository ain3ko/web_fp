<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('recipe', function (Blueprint $table) {
            $table->unsignedBigInteger('rating_id')->nullable(); // Allow null values initially

            // Add a foreign key constraint
            $table->foreign('rating_id')->references('id')->on('ratings')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('recipe', function (Blueprint $table) {
            $table->dropForeign(['rating_id']);
            $table->dropColumn('rating_id');
        });
    }
};
