@extends('layouts.master')

@section('title', 'Profile')

@section('content')
<div class="container mt-5 custom-container" style="font-family: Arial, sans-serif; overflow-x: hidden;"> 
    <h2>Your Profile</h2>
    <div class="row">
        <div class="col-md-8 order-md-1">
            <table class="table">
                <tbody>
                    <style>
                        html, body {
                        overflow-x: hidden;
                    }
                    </style>
                    
                    <tr>
                        <th>Name</th>
                        <td class="table-cell-name">{{ Auth::user()->name }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td class="table-cell-email">{{ Auth::user()->email }}</td>
                    </tr>
                    <tr>
                        <th>Contact Number</th>
                        <td class="table-cell-contact">{{ Auth::user()->contact_number }}</td>
                    </tr>
                    <tr>
                        <th>Gender</th>
                        <td class="table-cell-gender">{{ Auth::user()->gender }}</td>
                    </tr>
                    <tr>
                        <th>Birthday</th>
                        <td class="table-cell-birthday">{{ $formattedBirthday }}</td>
                    </tr>
                </tbody>
            </table>

            <h4>Update Your Profile</h4>
            <form action="{{ route('profile.update') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{ Auth::user()->name }}" class="form-control" style="width: 310px;" required>
                </div>
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" value="{{ Auth::user()->email }}" class="form-control" style="width: 310px;" required>
                </div>
                <div class="form-group mt-3">
                    <label for="contact_number">Contact Number</label>
                    <input type="tel" name="contact_number" value="{{ Auth::user()->contact_number }}" class="form-control" style="width: 180px;" pattern="[0-9]*" title="Please enter numbers only" required>
                </div>
                <div class="form-group mt-3">
                    <label for="gender">Gender</label>
                    <select name="gender" class="form-control" style="width: 180px;" required>
                        <option value="male" {{ Auth::user()->gender == 'male' ? 'selected' : '' }}>Male</option>
                        <option value="female" {{ Auth::user()->gender == 'female' ? 'selected' : '' }}>Female</option>
                        <option value="prefer_not_to_say" {{ Auth::user()->gender == 'prefer_not_to_say' ? 'selected' : '' }}>Prefer not to say</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="birthday">Birthday</label>
                    <input type="date" name="birthday" value="{{ $formattedBirthday }}" class="form-control" style="width: 180px;">
                </div>
                <button type="submit" class="btn btn-success mt-3">Update Details</button>
            </form>
        </div>

        <div class="col-md-4 order-md-2 text-center" style="position: relative;">
            <div class="profile-pic" style="width: 250px; margin: auto;">
                <img src="{{ Auth::user()->profile_picture ? asset('storage/' . Auth::user()->profile_picture) : asset('images/user.png') }}" 
                     alt="Profile Picture" 
                     class="img-fluid rounded-circle mb-3" 
                     style="width: 150px; height: 150px;">
                <form action="{{ route('profile.update.picture') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="profile_picture">Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary mt-2">Upload</button>
                </form>
            </div>
        </div>

        <div class="delete-account mt-5 text-right">
            <form action="{{ route('profile.delete') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete your account? This action cannot be undone.');">
                    Delete Account
                </button>
            </form>
        </div>

    </div>
</div>
@endsection


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Profile')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
