<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    use HasFactory;

    protected $table = 'steps';

    protected $fillable = [
        'step_1', 'step_2', 'step_3', 'step_4',
        'step_5', 'step_6', 'step_7', 'step_8'
    ];
    public function recipe()
{
    return $this->hasOne(Recipe::class, 'step_id'); // 'step_id' adalah foreign key di tabel recipe
}
    public $timestamps = false;
}


