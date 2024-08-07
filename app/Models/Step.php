<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = 'steps';
    protected $primaryKey = 'step_id';
    protected $fillable = ['step_id', 'step_1', 'step_2', 'step_3', 'step_4'
                            , 'step_5', 'step_6', 'step_7', 'step_8'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    public $timestamps = false;
}


