<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\FavoritesController;
use App\Http\Controllers\FiltersController;

// Homepage route
Route::get('/homepage', function () {
    return view('homepage');
})->name('homepage');

// Welcome page route
Route::get('/welcome', function () {
    return view('welcome');
})->name('welcome');

// Authentication routes
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

// Redirect root to homepage
Route::get('/', function() {
    return redirect()->route('homepage');
});

// Profile routes
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Recipe routes
Route::get('/recipes', [RecipeController::class, 'index'])->name('recipes');

// Favorites routes
Route::get('/favorites', [FavoritesController::class, 'index'])->name('favorites');

// Filters routes
Route::get('/filters', [FiltersController::class, 'index'])->name('filters');

// Logout route
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/login2', [AuthController::class, 'login'])->name('login2');

// Route for the login2 view
Route::get('/login2', function () {
    return view('auth.login2');
})->name('login2');


Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'showProfile'])->name('profile');
    Route::post('/profile/update', [ProfileController::class, 'updateDetails'])->name('profile.update');
    Route::post('/profile/update-picture', [ProfileController::class, 'updateProfilePicture'])->name('profile.update.picture');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.delete');
});

Route::get('/dashboard.recipes', [RecipeController::class, 'index'])->name('recipes.index');
Route::post('/dashboard.recipes', [RecipeController::class, 'store'])->name('recipes.store');

Route::get('/dashboard.addrecipe', [RecipeController::class, 'create'])->name('addrecipe');

Route::get('/dashboard.recipes', [RecipeController::class, 'index'])->name('recipes.index');

Route::get('/recipes/{id}', [RecipeController::class, 'show'])->name('recipes.show');


