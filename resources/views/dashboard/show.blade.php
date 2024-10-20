@extends('layouts.master')

@section('title', $recipe->name)

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 15px;">
    <!-- Recipe Details Card -->
    <div class="card p-4 shadow-sm" style="background-color: #ffffff; border-radius: 15px;">
        <!-- Recipe Image at the Top -->
        @if ($recipe->image)
         <img src="{{ asset('storage/recipe_images/' . $recipe->image) }}" alt="{{ $recipe->name }}"
             class="img-fluid rounded shadow-sm" style="max-width: 400px; height: auto;">
        @else
            <p class="text-muted">No image available</p>
        @endif

        <!-- Recipe Name -->
        <h2 class="text-center mb-4" style="font-weight: bold; color: #0d6efd;">{{ $recipe->name }}</h2>

        <!-- Recipe Content -->
        <div class="recipe-content">
            <h4 class="text-success" style="font-weight: bold;">Ingredients:</h4>
            <p>{{ $recipe->ingredients }}</p>

            <h4 class="text-success" style="font-weight: bold;">Description:</h4>
            <p>{{ $recipe->description }}</p>

            <h4 class="text-success" style="font-weight: bold;">Instructions:</h4>
            <p>{{ $recipe->instructions }}</p>
        </div>

        <!-- Back Button -->
        <div class="text-end mt-4">
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary shadow-sm rounded-pill px-3"
               style="height: 45px; font-size: 14px; display: inline-flex; align-items: center; transition: transform 0.2s;">
                 Back to Recipes
            </a>

<!-- Back to Welcome Button -->
<a href="{{ route('welcome') }}" class="btn btn-secondary shadow-sm rounded-pill px-3"
style="height: 45px; font-size: 14px; display: inline-flex; align-items: center; transition: transform 0.2s;">
  Back to Home
</a>
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

