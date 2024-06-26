<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'ratings';
    protected $primaryKey = 'rating_id';
    protected $fillable = ['rating_id', 'rating']; // Add 'rating' here

    public function recipe()
    {
        return $this->hasMany(Recipe::class, 'rating_id');
    }
    public $timestamps = false;
}
