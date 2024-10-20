@extends('layouts.master')

@section('title', 'Add Recipes')

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 10px; max-width: 600px;">
    <h3 class="mb-4 text-center text-primary" style="font-weight: bold;">Add New Recipe</h3>

    <form action="{{ route('recipes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Recipe Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Recipe Name:</label>
            <input type="text" name="name" id="name" class="form-control shadow-sm" value="{{ old('name') }}" required
                style="border-radius: 10px; max-width: 80%;">
            @error('name')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Description -->
        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" id="description" class="form-control shadow-sm" rows="3" required
                style="border-radius: 10px; max-width: 100%;">{{ old('description') }}</textarea>
            @error('description')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Ingredients -->
        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients:</label>
            <textarea name="ingredients" id="ingredients" class="form-control shadow-sm" rows="4" required
                style="border-radius: 10px; max-width: 100%;">{{ old('ingredients') }}</textarea>
            @error('ingredients')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Instructions -->
        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions:</label>
            <textarea name="instructions" id="instructions" class="form-control shadow-sm" rows="4" required
                style="border-radius: 10px; max-width: 100%;">{{ old('instructions') }}</textarea>
            @error('instructions')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Image Upload -->
        <div class="mb-3">
            <label for="image" class="form-label">Recipe Image:</label>
            <input type="file" name="image" id="image" class="form-control shadow-sm" accept="image/*"
                style="border-radius: 10px; max-width: 60%;">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- Buttons -->
        <div class="d-flex justify-content-center mt-4">
            <!-- Add Recipe Button -->
            <button type="submit" class="btn btn-success shadow-sm d-flex align-items-center justify-content-center"
                style="width: 120px; height: 45px; border-radius: 25px; transition: background-color 0.3s, transform 0.2s;">
                Add Recipe
            </button>

            <!-- Back to Recipes Button -->
            <a href="{{ route('recipes.index') }}" class="btn btn-secondary shadow-sm ms-3 d-flex align-items-center justify-content-center"
                style="width: 150px; height: 45px; border-radius: 25px; transition: background-color 0.3s, transform 0.2s;">
                Back to Recipes
            </a>

            <!-- Back to Home Button -->
            <a href="{{ route('welcome') }}" class="btn btn-secondary shadow-sm ms-3 d-flex align-items-center justify-content-center"
                style="width: 150px; height: 45px; border-radius: 25px; transition: background-color 0.3s, transform 0.2s;">
                Back to Home
            </a>
        </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success mt-4 text-center shadow-sm" style="border-radius: 10px; max-width: 100%;">
            {{ session('success') }}
        </div>
    @endif
</div>

<style>
    .btn-success:hover {
        background-color: #218838; /* Darker green for hover */
        transform: scale(1.05);
    }

    .btn-secondary:hover {
        background-color: #5a6268; /* Darker gray for hover */
        transform: scale(1.05);
    }

    /* Add hover effect on input fields and textarea */
    .form-control:hover {
        border-color: #0d6efd; /* Primary color */
    }

    /* Add focus effect to input fields and textarea */
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 8px rgba(13, 110, 253, 0.3); /* Light blue shadow */
    }

</style>
@endsection

