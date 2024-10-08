@extends('layouts.default')

@section('title', 'Logged Out')
@section('content')
    <style>
        body {
            overflow: hidden;
            height: 100vh; 
            margin: 0; 
        }

        .container {
            height: 100vh; 
            display: flex;
            justify-content: center;
            align-items: center; 
        }

        .card-body {
            text-align: center; 
        }

        .card-text {
            margin-bottom: 1rem; 
        }
    </style>

    <div class="container">
        <div class="card mx-auto" style="max-width: 400px;">
            <div class="card-header custom-header text-center">
                <h4 class="mb-0">Logged Out</h4>
            </div>
            <div class="card-body">
                <p class="card-text">You have been successfully logged out.</p>
                <p class="card-text">To access your account again,</p>
                <a href="{{ route('login') }}" class="btn btn-primary">Login</a>
            </div>
        </div>
    </div>
@endsection

