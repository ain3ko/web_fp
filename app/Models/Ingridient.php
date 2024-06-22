<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingridient extends Model
{
    use HasFactory;

    protected $table = 'ingredients';

    protected $fillable = [
        'ingredients_1', 'ingredients_2', 'ingredients_3', 'ingredients_4',
        'ingredients_5', 'ingredients_6', 'ingredients_7', 'ingredients_8'
    ];
    public function recipe()
{
    return $this->hasOne(Recipe::class, 'ingredient_id'); // 'ingridient_id' adalah foreign key di tabel recipe
}
    public $timestamps = false;
}

