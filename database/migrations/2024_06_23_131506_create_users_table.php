<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Hash; // Tambahkan ini untuk enkripsi password

return new class extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->timestamps();
        });

        // Menambahkan data dummy
        DB::table('users')->insert([
            ['username' => 'raka', 'password' => Hash::make('raka123')],
            ['username' => 'miftah', 'password' => Hash::make('miftah123')],
            ['username' => 'ai', 'password' => Hash::make('kangensaya')],
        ]);
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
