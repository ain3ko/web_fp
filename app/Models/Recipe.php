<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipe';

    protected $fillable = [
        'food_id', 'ingredient_id', 'step_id' // Ubah 'ingridient_id' menjadi 'ingredient_id'
    ];
public function food()
{
    return $this->belongsTo(Food::class);
}

public function ingredient()
{
    return $this->belongsTo(Ingridient::class);
}

public function step()
{
    return $this->belongsTo(Step::class);
}
    public $timestamps = false;
}
