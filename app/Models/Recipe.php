<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipe';
    protected $primaryKey = 'recipe_id';

    protected $fillable = [
        'food_id', 'ingredient_id', 'step_id', 'rating'
    ];
    
    public function food()
    {
        return $this->belongsTo(Food::class, 'food_id');
    }

    public function ingredients()
    {
        return $this->belongsTo(Ingredient::class, 'ingredient_id');
    }

    public function steps()
    {
        return $this->belongsTo(Step::class, 'step_id');
    }
    public function ratings()
    {
    return $this->hasMany(Rating::class, 'recipe_id');
    }

    public $timestamps = false;
}
