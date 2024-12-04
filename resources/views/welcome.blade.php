@extends('layouts.master')

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 10px;">
    <!-- Page Heading -->
    <h2 class="text-center mb-4" style="font-size: 70px; font-weight: bold; color: #077807;">BicoLuto</h2>
    <p class="text-muted text-center mb-5" style="font-size: 18px;">Explore delicious Bicolano recipes, manage your profile, and more!</p>

    <!-- Buttons Section -->
    <div class="d-flex justify-content-center flex-wrap gap-3 mb-5">
        <!-- Discover Recipes Button with Food Icon -->
        <a href="{{ route('recipes.index') }}" class="btn btn-primary shadow-lg px-4 py-2 text-white d-flex align-items-center justify-content-center"
           style="border-radius: 25px; transition: transform 0.3s, background-color 0.3s; font-size: 18px;">
            <i class="fas fa-utensils me-2"></i> Discover Recipes
        </a>

        <!-- Manage Profile Button with Profile Icon -->
        <a href="{{ route('profile') }}" class="btn btn-success shadow-lg px-4 py-2 text-white d-flex align-items-center justify-content-center"
           style="border-radius: 25px; transition: transform 0.3s, background-color 0.3s; font-size: 18px;">
            <i class="fas fa-user me-2"></i> Manage Profile
        </a>

        <!-- Add New Recipe Button with a Chef Hat Icon -->
        <a href="{{ route('addrecipe') }}" class="btn btn-warning shadow-lg px-4 py-2 text-dark d-flex align-items-center justify-content-center"
           style="border-radius: 25px; transition: transform 0.3s, background-color 0.3s; font-size: 18px;">
            <i class="fas fa-concierge-bell me-2"></i> Add New Recipe
        </a>
    </div>

    <!-- Featured Dishes Section -->
    <h3 class="text-success text-center mb-4" style="font-weight: bold;">Featured Dishes</h3>
    <div class="row justify-content-center">
<!-- Box 1 -->
<div class="col-12 col-sm-6 col-md-4 mb-4">
    <a href="{{ url('/recipes/1') }}" class="text-decoration-none">
        <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
            <img src="{{ asset('storage/recipe_images/7.png') }}" alt="Bicol Express"
                 class="card-img-top" style="width: 100%; height: 230px; object-fit: cover;">
            <div class="card-body text-center">
                <h5 class="card-title text-success" style="font-weight: bold;">Bicol Express</h5>
            </div>
        </div>
    </a>
</div>
    <!-- Box 2 -->
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <a href="{{ url('/recipes/2') }}" class="text-decoration-none">
            <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
                <img src="{{ asset('storage/recipe_images/9.png') }}" alt="Pancit Bato"
                     class="card-img-top" style="width: 100%; height: 230px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-success" style="font-weight: bold;">Pancit Bato</h5>
                </div>
            </div>
        </a>
    </div>

    <!-- Box 3 -->
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <a href="{{ url('/recipes/3') }}" class="text-decoration-none">
            <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
                <img src="{{ asset('storage/recipe_images/5.png') }}" alt="Laing"
                     class="card-img-top" style="width: 100%; height: 230px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-success" style="font-weight: bold;">Laing</h5>
                </div>
            </div>
        </a>
    </div>

    <!-- Box 4 -->
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <a href="{{ url('/recipes/4') }}" class="text-decoration-none">
            <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
                <img src="{{ asset('storage/recipe_images/14.png') }}" alt="Kandingga"
                     class="card-img-top" style="width: 100%; height: 230px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-success" style="font-weight: bold;">Kandingga</h5>
                </div>
            </div>
        </a>
    </div>

    <!-- Box 5 -->
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <a href="{{ url('/recipes/5') }}" class="text-decoration-none">
            <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
                <img src="{{ asset('storage/recipe_images/8.jpg') }}" alt="Ginataang Santol"
                     class="card-img-top" style="width: 100%; height: 230px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-success" style="font-weight: bold;">Ginataang Santol</h5>
                </div>
            </div>
        </a>
    </div>

    <!-- Box 6 -->
    <div class="col-12 col-sm-6 col-md-4 mb-4">
        <a href="{{ url('/recipes/6') }}" class="text-decoration-none">
            <div class="card shadow-sm h-100" style="border-radius: 15px; overflow: hidden; transition: transform 0.3s; cursor: pointer;">
                <img src="{{ asset('storage/recipe_images/3.png') }}" alt="Kinunot"
                     class="card-img-top" style="width: 100%; height: 230px; object-fit: cover;">
                <div class="card-body text-center">
                    <h5 class="card-title text-success" style="font-weight: bold;">Kinunot</h5>
                </div>
            </div>
        </a>
    </div>

<!-- Styles -->
<style>
    /* Button Hover Effects */
    .btn-primary:hover, .btn-success:hover, .btn-warning:hover {
        transform: scale(1.1);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Card Hover Effects */
    .card:hover {
        transform: scale(1.05);
        box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Common Transition */
    .btn, .card {
        transition: box-shadow 0.3s, transform 0.2s;
    }

    /* Center Elements on Mobile */
    @media (max-width: 768px) {
        .d-flex.justify-content-center {
            flex-direction: column;
            align-items: center;
        }
    }
</style>
@endsection
