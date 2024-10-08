@extends('layouts.master')

@section('title', 'Add Recipes')

@section('content')
<div class="container mt-5" style="font-family: Arial, sans-serif;">
    <h3 class="mb-4">Add New Recipe</h3>
    
    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Recipe Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Recipe Name:</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ingredients -->
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients:</label>
            <textarea name="ingredients" id="ingredients" class="form-control" rows="4" required>{{ old('ingredients') }}</textarea>
            @error('ingredients')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Instructions -->
        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions:</label>
            <textarea name="instructions" id="instructions" class="form-control" rows="4" required>{{ old('instructions') }}</textarea>
            @error('instructions')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Recipe Image:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        
        <button type="submit" class="btn btn-success">Add Recipe</button>

        
        <a href="{{ route('recipes.index') }}" class="btn btn-secondary ms-2">Back to Recipes</a>
    </form>

    
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
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