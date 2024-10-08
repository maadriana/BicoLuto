@extends('layouts.homepage')

@section('content')
    <div class="homepage-background">
    <div class="blurred-overlay"></div> 
    <div class="container mt-5 text-center" style="position: relative; z-index: 2;">
    <div class="container mt-5 text-center">
    <h2 class="custom-heading" style="margin: -14rem 0;">
            <span class="part-1 bold-text">Welcome to the</span> 
            <span class="part-2 bold-text">BicoLuto!</span>
        <p class="custom-text">
            Dive into the heart of Bicolano cuisine. Browse, save, and share your favorite recipes.</p>
            <p class="custom-text">
            <a href="{{ route('login') }}" class="custom-link">Login</a> to get started!
        </h2>
        </p>
    </div>
@endsection




