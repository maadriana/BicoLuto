@extends('layouts.master')

@section('content')
<div class="container">
    <h1>Edit Recipe</h1>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('recipes.update', $recipe->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" class="form-control" value="{{ $recipe->title }}" required>
        </div>

        <div class="mb-3">
            <label for="ingredients" class="form-label">Ingredients</label>
            <textarea name="ingredients" class="form-control" rows="5" required>{{ $recipe->ingredients }}</textarea>
        </div>

        <div class="mb-3">
            <label for="instructions" class="form-label">Instructions</label>
            <textarea name="instructions" class="form-control" rows="5" required>{{ $recipe->instructions }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Recipe Image (optional)</label>
            <input type="file" name="image" class="form-control">
            @if($recipe->image)
                <img src="{{ asset('storage/' . $recipe->image) }}" alt="Current Recipe Image" class="img-fluid mt-2" style="max-width: 200px;">
            @endif
        </div>

            <button type="submit" class="btn btn-primary mt-3" style="border-radius: 30px; padding: 10px 20px; background-color: #28682a; border: none;">Update Recipe</button>
        </div>
    </form>
</div>
@endsection
