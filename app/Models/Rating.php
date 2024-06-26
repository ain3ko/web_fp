<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'rating_id';
    protected $fillable = ['rating_id', 'recipe_id','rating']; // Add 'rating' here

    public function recipe()
{
    return $this->belongsTo(Recipe::class, 'recipe_id');
}
    public $timestamps = false;
}
