<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Difficulty;

class DifficultySeeder extends Seeder
{
    public function run()
    {
        $difficulties = ['Easy', 'Intermediate', 'Expert'];

        foreach ($difficulties as $level) {
            Difficulty::create([
                'difficulty_name' => $level,
            ]);
        }
    }
}
