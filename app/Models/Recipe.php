<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'image'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function instructions()
    {
        return $this->hasMany(RecipeInstruction::class);
    }


    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients');
    }

    public function difficulty()
    {
        return $this->hasOneThrough(
            Difficulty::class,
            RecipeDifficulty::class,
            'recipe_id',
            'id',
            'id',
            'difficulty_id'
        );
    }
}
