<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RecipeInstruction extends Model
{
    use HasFactory;

    protected $fillable = ['recipe_id', 'instruction'];

    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }
}
