<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BicoLuto')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


    <style>

        .navbar {
            background-color: #58b46d;
        }
        .navbar .nav-link {
            color: #fff !important;
            font-weight: bold;
            margin-right: 15px;
            transition: background-color 0.3s, color 0.3s;
        }
        .navbar .nav-link:hover, .navbar .nav-link.active {
            background-color: #218838;
            color: #fff !important;
            border-radius: 5px;
        }


        .logout-link {
            color: #fff !important;
            text-decoration: none;
            padding: 0;
        }
        .logout-link:hover {
            color: #f8f9fa !important;
        }


        main {
            padding: 20px;
        }


        @media (max-width: 768px) {
            .navbar .nav-link {
                margin-right: 0;
                margin-bottom: 5px;
            }
            .navbar-nav {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <div class="container d-flex align-items-center">
                <!-- Logo and Brand Name -->
                <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('welcome') }}" style="color: #fff; font-size: 24px;">
                    <img src="{{ asset('images/logo.png') }}" alt="logo" class="logo-img me-2" style="height: 40px; width: auto;">
                    BicoLuto
                </a>

                <!-- Toggler button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('recipes') ? 'active' : '' }}" href="{{ route('recipes') }}">Recipes</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link logout-link">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="flex-fill py-4">
            @yield('content')
        </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
