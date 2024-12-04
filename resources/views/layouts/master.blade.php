<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BicoLuto')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

    <style>

        .navbar {
            background-color: #58b46d;
            box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        }

        .navbar .navbar-brand {
            font-size: 1.5rem;
            font-weight: bold;
            color: #fff !important;
        }

        .navbar .nav-link {
            color: #fff !important;
            font-weight: 500;
            margin-right: 15px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s, transform 0.2s;
        }


        .navbar .logout-link {
            color: #fff !important;
            text-decoration: none;
            padding: 0;
        }

        .navbar .logout-link:hover {
            color: #f8f9fa !important;
            text-decoration: underline;
        }


        body {
            background-color: #f8f9fa; /
            font-family: 'Arial', sans-serif;
        }

        main {
            padding: 20px;
        }

        footer {
            background-color: #58b46d;
            color: #fff;
            padding: 10px 20px;
            text-align: center;
            font-size: 14px;
            box-shadow: 0px -4px 6px rgba(0, 0, 0, 0.1);
        }

        footer a {
            color: #fff;
            text-decoration: underline;
        }

        footer a:hover {
            text-decoration: none;
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

                <!-- Toggler button for small screens -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Navbar Links -->
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">
                                <i class="fas fa-home me-1"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">
                                <i class="fas fa-user me-1"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ Request::routeIs('recipes') ? 'active' : '' }}" href="{{ route('recipes') }}">
                                <i class="fas fa-utensils me-1"></i> Recipes
                            </a>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link logout-link">
                                    <i class="fas fa-sign-out-alt me-1"></i> Logout
                                </button>
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

        <!-- Footer -->
        <footer>
            &copy; {{ date('Y') }} BicoLuto. All Rights Reserved. <a href="{{ route('welcome') }}">Privacy Policy</a>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
