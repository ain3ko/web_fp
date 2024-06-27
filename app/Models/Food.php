<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'food';
    protected $primaryKey = 'food_id';
    protected $fillable = [
        'food_name', 'food_desc', 'category_id', 'food_img'
    ];
    public $timestamps = false;

    public function recipe()
    {
        return $this->hasMany(Recipe::class, 'food_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
