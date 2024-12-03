<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeDifficulty extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'difficulty_id'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    public function difficulty()
    {
        return $this->belongsTo(Difficulty::class);
    }
}


