@extends('layouts.master')

@section('title', $recipe->name)

@section('content')
<div class="mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 15px; width: 70%; margin: auto;">

    <div class="card p-4 shadow-sm" style="background-color: #ffffff; border-radius: 15px;">

        @if ($recipe->image)
        <div class="text-center mb-4">
            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}"
                 class="img-fluid rounded shadow-sm" style="max-width: 350px; height: auto;">
        </div>
        @else
        <p class="text-muted text-center">No image available</p>
        @endif


        <h2 class="text-center mb-4" style="font-weight: bold; color: #0d6efd;">{{ $recipe->name }}</h2>

        <!-- Recipe Content -->
        <div class="recipe-content">
            <!-- Ingredients -->
            <h4 class="text-success" style="font-weight: bold;">Ingredients:</h4>
            <ul>
                @foreach ($recipe->ingredients as $ingredient)
                    <li>{{ $ingredient->ingredient_name }}</li>
                @endforeach
            </ul>

            <!-- Description -->
            <h4 class="text-success" style="font-weight: bold;">Description:</h4>
            <p>{{ $recipe->description }}</p>

            <!-- Difficulty -->
            <h4 class="text-success" style="font-weight: bold;">Difficulty:</h4>
            <p>
                <span
                    class="badge"
                    style="
                        background-color:
                            {{ isset($recipe->difficulty) && $recipe->difficulty->difficulty === 'Easy' ? '#28a745' :
                               (isset($recipe->difficulty) && $recipe->difficulty->difficulty === 'Intermediate' ? '#ffc107' :
                               (isset($recipe->difficulty) && $recipe->difficulty->difficulty === 'Expert' ? '#dc3545' : '#6c757d')) }};
                        color: white;
                    ">
                    {{ $recipe->difficulty->difficulty ?? 'N/A' }}
                </span>
            </p>

            <!-- Instructions -->
            <h4 class="text-success" style="font-weight: bold;">Instructions:</h4>
            <ol>
                @foreach ($recipe->instructions as $instruction)
                    <li>{{ $instruction->instruction }}</li>
                @endforeach
            </ol>
        </div>

        <!-- Back Buttons -->
        <div class="text-end mt-4">
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary shadow-sm rounded-pill px-3"
               style="height: 45px; font-size: 14px; display: inline-flex; align-items: center; transition: transform 0.2s;">
                 Back to Recipes
            </a>

            <a href="{{ route('welcome') }}" class="btn btn-secondary shadow-sm rounded-pill px-3"
               style="height: 45px; font-size: 14px; display: inline-flex; align-items: center; transition: transform 0.2s;">
                 Back to Home
            </a>
        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    .btn-secondary:hover {
        background-color: #5a6268;
        transform: scale(1.05);
    }

    .btn {
        transition: box-shadow 0.3s, transform 0.2s;
    }
</style>
@endsection
