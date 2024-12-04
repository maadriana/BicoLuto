@extends('layouts.master')

@section('title', 'Recipes')

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 15px;">

    <!-- Header Section -->
    <h2 class="text-center mb-4" style="font-weight: bold; color: #077807; font-size: 36px;">Discover Delicious Recipes</h2>
    <p class="text-center text-muted mb-5" style="font-size: 18px;">Find the perfect dish or ingredient that suits your taste</p>

    <!-- Search Form -->
    <form action="{{ route('recipes.index') }}" method="GET" class="mb-5">
        <div class="row justify-content-center align-items-center gap-3">
            <!-- Search Input -->
            <div class="col-auto">
                <input
                    type="text"
                    name="search"
                    class="form-control shadow-sm"
                    placeholder="Search for a dish or ingredient"
                    value="{{ request()->query('search', $search ?? '') }}"
                    style="width: 400px; height: 50px; border-radius: 25px; padding-left: 20px; font-size: 16px;">
            </div>
            <!-- Search Button -->
            <div class="col-auto">
                <button
                    type="submit"
                    class="btn btn-primary shadow-sm d-flex align-items-center justify-content-center"
                    style="height: 50px; width: 150px; border-radius: 25px; transition: transform 0.2s;">
                    <i class="fas fa-search me-2"></i> Search
                </button>
            </div>
            <!-- Upload Recipe Button -->
            <div class="col-auto">
                <a
                    href="{{ route('addrecipe') }}"
                    class="btn btn-success shadow-sm d-flex align-items-center justify-content-center"
                    style="height: 50px; width: 180px; border-radius: 25px; transition: transform 0.2s;">
                    <i class="fas fa-upload me-2"></i> Upload Recipe
                </a>
            </div>
        </div>
    </form>
    <!-- Recipe Results -->
    <h3 class="text-center mb-4 text-success" style="font-weight: bold;">Recipe Results</h3>
    <div class="d-flex justify-content-center">
        <div class="row w-50">
            @forelse($recipes as $recipe)
                <div class="col-12 mb-4">
                    <a href="{{ route('recipes.show', ['id' => $recipe->id, 'search' => request()->query('search')]) }}" style="text-decoration: none; color: inherit;">
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
                                            <!-- Ingredients -->
                                        <h4 class="text-success" style="font-weight: bold;">Ingredients:</h4>
                                        <p>
                                           {{ $recipe->ingredients->pluck('ingredient_name')->implode(', ') }}
                                        </p>

                                        </p>
                                        <p class="card-text mt-2">
                                            <p class="card-text mt-2">
                                                <strong>Difficulty:</strong>
                                                <span
                                                    class="badge"
                                                    style="
                                                        background-color:
                                                            {{ isset($recipe->difficulty) && $recipe->difficulty->difficulty_name === 'Easy' ? '#28a745' :
                                                               (isset($recipe->difficulty) && $recipe->difficulty->difficulty_name === 'Intermediate' ? '#ffc107' :
                                                               (isset($recipe->difficulty) && $recipe->difficulty->difficulty_name === 'Expert' ? '#dc3545' : '#6c757d')) }};
                                                        color: white;">
                                                    {{ $recipe->difficulty->difficulty_name ?? 'N/A' }}
                                                </span>
                                            </p>
                                    </div>

                                    <!-- Recipe Image -->
                                    <div class="ms-3">
                                        @if ($recipe->image)
                                            <img
                                                src="{{ asset('storage/' . $recipe->image) }}"
                                                alt="{{ $recipe->name }}"
                                                class="img-fluid rounded shadow-sm"
                                                style="max-width: 250px; height: auto;">
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
                @if(request()->has('search') && request()->query('search') !== '')
                    <div class="col-12 text-center">
                        <p class="text-muted">No recipes found.</p>
                    </div>
                @endif
            @endforelse

        </div>
    </div>
</div>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<style>
    body {
        background-color: #f8f9fa;
    }

    .recipe-card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    .btn, .recipe-card {
        transition: box-shadow 0.3s, transform 0.2s;
    }
</style>
@endsection
