<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;
    protected $table = 'food';
    protected $fillable = [
        'food_name', 'food_desc', 'category_id', 'food_img'
    ];
    public $timestamps = false;
    public function recipe(){
    return $this->hasOne(Recipe::class, 'food_id');
}
}
