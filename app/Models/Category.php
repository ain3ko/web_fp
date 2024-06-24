<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Nama tabel yang sesuai dengan model
    protected $table = 'category'; // Sesuaikan jika nama tabel Anda berbeda
    protected $primaryKey = 'category_id';

    // Kolom-kolom yang dapat diisi secara massal
    protected $fillable = [
        'category_name', // Sesuaikan jika ada kolom lain yang ingin diisi
    ];

    // Relasi dengan tabel 'food' (One-to-Many)
    public function foods()
    {
        return $this->hasMany(Food::class, 'category_id'); // Sesuaikan foreign key jika berbeda
    }
}


