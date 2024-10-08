@extends('layouts.master')

@section('title', 'Recipes')

@section('content')
<div class="container mt-5" style="font-family: Arial, sans-serif;"> 
    <h2>Search Recipes</h2>
    <form action="{{ route('recipes.index') }}" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" class="form-control" placeholder="Search for a dish or ingredient" value="{{ request()->input('search') }}">
            <button class="btn btn-primary" type="submit">Search</button>
        </div>
    </form>
    
    <div class="mt-3 mb-4">
        <a href="{{ route('addrecipe') }}" class="btn btn-success">Upload Recipe</a>
    </div>

    <h3>Recipe Results:</h3>
    <ul class="list-group mb-5">
        @forelse($recipes as $recipe)
            <li class="list-group-item">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h4>{{ $recipe->name }}</h4>
                        <p><strong>Ingredients:</strong> {{ $recipe->ingredients }}</p>
                        <p><strong>Instructions:</strong> {{ $recipe->instructions }}</p>
                    </div>
                    <div>
                        @if ($recipe->image)
                            <img src="{{ asset('storage/' . $recipe->image) }}" alt="{{ $recipe->name }}" class="img-fluid rounded" style="max-width: 150px; height: auto;">
                        @else
                            <p>No image available</p>
                        @endif
                    </div>
                </div>
            </li>
        @empty
            <li class="list-group-item custom-width">No recipes found.</li>
        @endforelse
    </ul>
</div>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Recipes')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>