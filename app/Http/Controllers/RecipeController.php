<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use App\Models\Ingredient;
use App\Models\Difficulty;
use App\Models\RecipeDifficulty;
use Illuminate\Http\Request;

class RecipeController extends Controller
{

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'difficulty' => 'required|string|exists:difficulties,difficulty_name',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $imagePath = null;


        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
        }


        $recipe = Recipe::create([
            'user_id' => auth()->id(),
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imagePath,
        ]);


        $difficulty = Difficulty::where('difficulty_name', $request->input('difficulty'))->first();

        RecipeDifficulty::create([
            'recipe_id' => $recipe->id,
            'difficulty_id' => $difficulty->id,
        ]);

        $ingredientNames = preg_split("/[\r\n,]+/", $request->input('ingredients'));
        $ingredientIds = [];

        foreach ($ingredientNames as $ingredientName) {
           $trimmedName = trim($ingredientName);
           if (!empty($trimmedName)) {

        $ingredient = Ingredient::firstOrCreate(['ingredient_name' => $trimmedName]);
        $ingredientIds[] = $ingredient->id;
        }
    }


        $recipe->ingredients()->attach($ingredientIds);


        $instructions = preg_split("/[\r\n]+/", $request->input('instructions'));
        foreach ($instructions as $instructionText) {
        $trimmedInstruction = trim($instructionText);
        if (!empty($trimmedInstruction)) {

        $recipe->instructions()->create(['instruction' => $trimmedInstruction]);
    }
}


return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
}

public function index(Request $request)
{
    $searchTerm = $request->input('search');

    if ($searchTerm) {
        $normalizedSearch = preg_replace('/\s*,\s*/', ',', $searchTerm);
        $searchWords = array_map('trim', explode(',', $normalizedSearch));
        $recipes = Recipe::where(function ($query) use ($searchWords) {
            foreach ($searchWords as $word) {
                $query->orWhereRaw('LOWER(name) LIKE ?', ['%' . strtolower($word) . '%'])
                    ->orWhereHas('ingredients', function ($subQuery) use ($word) {
                        $subQuery->whereRaw('LOWER(ingredient_name) LIKE ?', ['%' . strtolower($word) . '%']);
                    });
            }
        })->get();
    } else {
        $recipes = collect();
    }

    return view('dashboard.recipes', compact('recipes', 'searchTerm'));
    }

    public function create()
    {
        return view('dashboard.addrecipe');
    }

    public function show($id, Request $request)
    {
        $recipe = Recipe::with(['ingredients', 'difficulty', 'instructions'])->findOrFail($id);
        $searchTerm = $request->query('search');

        return view('dashboard.show', compact('recipe'));
    }
}
