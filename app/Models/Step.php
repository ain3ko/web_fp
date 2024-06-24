<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = 'steps';
    protected $primaryKey = 'step_id';
    // Tidak perlu mencantumkan 'step_[]' di fillable
    protected $fillable = ['step_id', 'step_1', 'step_2', 'step_3', 'step_4'
                            , 'step_5', 'step_6', 'step_7', 'step_8']; // Hanya 'recipe_id' yang perlu di sini

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
    public $timestamps = false;
}


