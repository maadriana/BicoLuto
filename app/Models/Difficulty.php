<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Difficulty extends Model
{
    use HasFactory;

    protected $fillable = ['difficulty_name'];

    /**
     * Define the relationship with RecipeDifficulty.
     */
    public function recipeDifficulties()
    {
        return $this->hasMany(RecipeDifficulty::class);
    }
}
