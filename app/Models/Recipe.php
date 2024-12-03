<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'description', 'image'];

    // A recipe belongs to a user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // A recipe can have many instructions
    public function instructions()
    {
        return $this->hasMany(RecipeInstruction::class);
    }

    // A recipe can have many ingredients
    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class, 'recipe_ingredients');
    }

    public function difficulty()
    {
    return $this->hasOne(RecipeDifficulty::class);
    }

}
