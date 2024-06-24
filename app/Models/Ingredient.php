<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingredient extends Model
{
    protected $table = 'ingredients';
    protected $primaryKey = 'ingredient_id';
    // Tidak perlu mencantumkan 'ingredient_[]' di fillable
    protected $fillable = ['ingredient_id', 'ingredient_1', 'ingredient_2', 'ingredient_3','ingredient_4',
                            'ingredient_5', 'ingredient_6', 'ingredient_7', 'ingredient_8']; 

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    public $timestamps = false;
}

