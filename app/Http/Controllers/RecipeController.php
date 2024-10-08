<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RecipeController extends Controller
{
   
    public function store(Request $request)
    {      
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'instructions' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

       
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('recipe_images', 'public');
        }

        
        Recipe::create([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'ingredients' => $request->input('ingredients'),
            'instructions' => $request->input('instructions'),
            'image' => $imagePath, 
        ]);

        
        return redirect()->route('recipes.index')->with('success', 'Recipe added successfully!');
    }
    
    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
    
        
        if ($searchTerm && preg_match('/^[a-zA-Z\s]+$/', $searchTerm)) {
            $lowerSearchTerm = strtolower(trim($searchTerm));
            $searchWords = array_map('trim', explode(' ', $lowerSearchTerm));
            $recipes = Recipe::where(function ($query) use ($searchWords) {
                foreach ($searchWords as $word) {
                    $query->orWhereRaw('LOWER(name) LIKE ?', ['%' . $word . '%']);
                    $query->orWhereRaw('LOWER(ingredients) LIKE ?', ['%' . $word . '%']);
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
}
