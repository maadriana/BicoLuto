@extends('layouts.master')

@section('title', 'Profile')

@section('content')
<div class="container mt-5 p-4" style="font-family: 'Arial', sans-serif; background-color: #f8f9fa; border-radius: 12px; max-width: 800px;">
    <!-- Header -->
    <h2 class="text-center mb-4" style="font-weight: bold; color: #077807;">Your Profile</h2>

    <!-- Profile Picture & Information -->
    <div class="d-flex flex-wrap align-items-start gap-4 mb-4">
        <!-- Profile Picture Section -->
        <div class="card shadow-sm p-4 text-center" style="border-radius: 12px; background-color: #f8f9fa; max-width: 220px;">
            <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/user.png') }}"
                 alt="Profile Picture"
                 class="img-fluid rounded-circle shadow-sm mb-3"
                 style="width: 150px; height: 150px;">
            <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group mb-3">
                    <input type="file" name="profile_picture" class="form-control shadow-sm" style="border-radius: 25px;">
                </div>
                <button type="submit" class="btn btn-success shadow-sm w-100" style="border-radius: 25px; transition: background-color 0.3s, transform 0.2s;">
                    Upload
                </button>
            </form>
        </div>

        <!-- Profile Information -->
        <div class="flex-grow-1">
            <div class="card shadow-sm p-4 mb-4" style="border-radius: 12px; background-color: #f8f9fa;">
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
    <div class="card shadow-sm p-4 mb-4" style="border-radius: 12px; background-color: #f8f9fa;">
        <h4 class="text-success mb-3" style="font-weight: bold;">Update Your Profile</h4>
        <form action="{{ route('profile.update') }}" method="POST" class="row g-3">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control shadow-sm" style="border-radius: 25px; width: 300px;" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control shadow-sm" style="border-radius: 25px;  width: 300px;" required>
            </div>
            <div class="col-md-6">
                <label for="contact_number" class="form-label">Contact Number</label>
                <input type="tel" name="contact_number" value="{{ Auth::user()->contact_number }}" class="form-control shadow-sm" style="border-radius: 25px;  width: 250px;" pattern="[0-9]*" title="Please enter numbers only" required>
            </div>
            <div class="col-md-6">
                <label for="gender" class="form-label">Gender</label>
                <select name="gender" class="form-control shadow-sm" style="border-radius: 25px;  width: 250px;" required>
                    <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                    <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                </select>
            </div>
            <div class="col-md-6">
                <label for="birthday" class="form-label">Birthday</label>
                <input type="date" name="birthday" value="{{ $formattedBirthday }}" class="form-control shadow-sm" style="border-radius: 25px;  width: 180px;">
            </div>
            <div class="col-12 text-center" style="margin-top: 50px;">
                <button type="submit" class="btn btn-primary shadow-sm"
                        style="border-radius: 25px; width: 190px; height: 50px; transition: background-color 0.3s, transform 0.2s;">
                    Update Details
                </button>
            </div>
        </form>
    </div>

    <!-- Delete Account Section -->
    <div class="card shadow-sm p-4" style="border-radius: 12px; background-color: #f8f9fa;">
        <form action="{{ route('profile.delete') }}" method="POST" class="text-center">
            @csrf
            <button type="submit" class="btn btn-danger shadow-sm" style="border-radius: 25px; width: 190px; height: 50px; transition: background-color 0.3s, transform 0.2s;"
                    onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                Delete Account
            </button>
        </form>
    </div>
</div>

<!-- Styles -->
<style>
    body {
        background-color: #f8f9fa;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-success:hover {
        background-color: #218838;
    }

    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
@endsection
