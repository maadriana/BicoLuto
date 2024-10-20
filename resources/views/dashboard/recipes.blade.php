@extends('layouts.master')

@section('title', 'Recipes')

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 10px;">
    <!-- Page Heading -->
    <h2 class="text-center mb-4" style="font-weight: bold; color: #0d6efd;">Discover Delicious Recipes</h2>
    <p class="text-center text-muted mb-5" style="font-size: 18px;">Find the perfect dish or ingredient that suits your taste</p>

    <!-- Search Form -->
    <form action="{{ route('recipes.index') }}" method="GET" class="mb-5">
        <div class="row justify-content-center">
            <!-- Search Input -->
            <div class="col-auto">
                <input type="text" name="search" class="form-control shadow-sm"
                       placeholder="Search for a dish or ingredient"
                       value="{{ request()->query('search', $search ?? '') }}"
                       style="width: 380px; height: 50px; border-radius: 25px; padding-left: 20px;">
            </div>
            <!-- Search Button -->
            <div class="col-auto">
                <button type="submit" class="btn btn-primary shadow-sm d-flex align-items-center justify-content-center"
                        style="height: 50px; border-radius: 25px; transition: transform 0.2s;">
                    <i class="fas fa-search me-2"></i> Search
                </button>
            </div>
            <!-- Upload Recipe Button -->
            <div class="col-auto">
                <a href="{{ route('addrecipe') }}" class="btn btn-success shadow-sm d-flex align-items-center justify-content-center"
                   style="height: 50px; border-radius: 25px; transition: transform 0.2s;">
                    <i class="fas fa-upload me-2"></i> Upload Recipe
                </a>
            </div>
        </div>
    </form>

    <!-- Recipe Results -->
    <h3 class="text-center mb-4 text-success" style="font-weight: bold;">Recipe Results</h3>
    <div class="row">
        @forelse($recipes as $recipe)
            <div class="col-md-6 mb-4">
                <a href="{{ route('recipes.show', $recipe->id) }}" style="text-decoration: none; color: inherit;">
                    <div class="card shadow-sm h-100 recipe-card" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <!-- Recipe Details -->
                                <div class="flex-grow-1">
                                    <h4 class="card-title text-success" style="font-weight: bold;">
                                        {{ $recipe->name }}
                                    </h4>
                                    <p class="card-text">
                                        <strong>Ingredients:</strong>
                                        {{ $recipe->ingredients }}
                                    </p>
                                </div>

                                <!-- Recipe Image -->
                                <div class="ms-3">
                                    @if ($recipe->image)
                                        <img src="{{ asset('recipe_images/' . $recipe->image) }}" alt="{{ $recipe->name }}"
                                             class="img-fluid rounded shadow-sm" style="max-width: 100px; height: auto;">
                                    @else
                                        <p class="text-muted">No image available</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <div class="col-12 text-center">
                <p class="text-muted">No recipes found.</p>
            </div>
        @endforelse
    </div>
</div>


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    body {
        background-color: #ffffff;
    }

    .recipe-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    .btn-primary:hover {
        background-color: #0056b3;
        transform: scale(1.05);
    }

    .btn-success:hover {
        background-color: #218838;
        transform: scale(1.05);
    }

    .btn, .recipe-card {
        transition: box-shadow 0.3s, transform 0.2s;
    }
</style>
@endsection

