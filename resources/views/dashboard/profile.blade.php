@extends('layouts.master')

@section('title', 'Profile')

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 12px; max-width: 800px;">
    <!-- Header -->
    <h2 class="text-center mb-4" style="font-weight: bold; color: #0d6efd;">Your Profile</h2>

    <!-- Profile Picture & Information Side by Side -->
    <div class="d-flex align-items-start mb-4">
        <!-- Profile Picture Section -->
        <div class="card shadow-sm p-3 me-4" style="border-radius: 12px; background-color: #fff; max-width: 200px;">
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/user.png') }}"
                 alt="Profile Picture"
                 class="img-fluid rounded-circle shadow-sm mb-3 mx-auto d-block"
                 style="width: 180px; height: 180px;">
            <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-2">
                    <input type="file" name="profile_picture" class="form-control shadow-sm" style="border-radius: 25px;">
                </div>
                <button type="submit" class="btn btn-secondary w-100 shadow-sm" style="border-radius: 25px; transition: background-color 0.3s, transform 0.2s;">
                    Upload
                </button>
            </form>
        </div>

        <!-- Profile Information -->
        <div class="flex-grow-1">
            <!-- User Info Table -->
            <div class="card shadow-sm p-4 mb-4" style="border-radius: 12px; background-color: #fff;">
                <h4 class="text-success mb-3" style="font-weight: bold;">Profile Information</h4>
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <th class="text-muted" style="width: 35%;">Name:</th>
                            <td>{{ Auth::user()->name }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Email:</th>
                            <td>{{ Auth::user()->email }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Contact Number:</th>
                            <td>{{ Auth::user()->contact_number }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Gender:</th>
                            <td>{{ Auth::user()->gender }}</td>
                        </tr>
                        <tr>
                            <th class="text-muted">Birthday:</th>
                            <td>{{ $formattedBirthday }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

   <!-- Update Profile Form -->
<div class="card shadow-sm p-4 mb-4" style="border-radius: 12px; background-color: #fff;">
    <h4 class="text-success mb-3" style="font-weight: bold;">Update Your Profile</h4>
    <form action="{{ route('profile.update') }}" method="POST" class="d-flex flex-wrap gap-2">
        @csrf

        <!-- Name -->
        <div class="form-group mb-3 w-100">
            <label for="name" class="form-label">Name</label>
            <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control shadow-sm"
                   style="width: 400px; border-radius: 25px;" required>
        </div>

        <!-- Email -->
        <div class="form-group mb-3 w-100">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control shadow-sm"
                   style="width: 400px; border-radius: 25px;" required>
        </div>

        <!-- Contact Number -->
        <div class="form-group mb-3 w-100">
            <label for="contact_number" class="form-label">Contact Number</label>
            <input type="tel" name="contact_number" value="{{ Auth::user()->contact_number }}" class="form-control shadow-sm"
                   style="width: 400px; border-radius: 25px;" pattern="[0-9]*" title="Please enter numbers only" required>
        </div>

        <!-- Gender -->
        <div class="form-group mb-3 w-100">
            <label for="gender" class="form-label">Gender</label>
            <select name="gender" class="form-control shadow-sm"
                    style="width: 200px; border-radius: 25px;" required>
                <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
            </select>
        </div>

        <!-- Birthday -->
        <div class="form-group mb-3 w-100">
            <label for="birthday" class="form-label">Birthday</label>
            <input type="date" name="birthday" value="{{ $formattedBirthday }}" class="form-control shadow-sm"
                   style="width: 200px; border-radius: 25px;">
        </div>

        <!-- Update Button -->
        <div class="d-flex w-100 mt-3 justify-content-start">
            <button type="submit" class="btn btn-primary shadow-sm d-flex align-items-center justify-content-center"
                    style="border-radius: 25px; width: 150px; height: 45px; transition: background-color 0.3s, transform 0.2s;">
                Update Details
            </button>
        </div>
    </form>
</div>

<!-- Separate Delete Account Form -->
<div class="card shadow-sm p-4 mb-4" style="border-radius: 12px; background-color: #fff;">
    <form action="{{ route('profile.delete') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-danger shadow-sm"
                style="border-radius: 25px; width: 150px; height: 45px; transition: background-color 0.3s, transform 0.2s;"
                onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
            Delete Account
        </button>
    </form>
</div>

<style>
    .btn:hover {
        transform: scale(1.05);
    }
    .btn-primary:hover {
        background-color: #0056b3;
    }
    .btn-secondary:hover {
        background-color: #5a6268;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
@endsection


