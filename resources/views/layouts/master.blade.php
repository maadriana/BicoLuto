<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'BicoLuto')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>

<body>
    <div class="d-flex flex-column min-vh-100">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse">
            <ul class="navbar-nav mr-auto">
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('welcome') ? 'active' : '' }}" href="{{ route('welcome') }}">BicoLuto</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('profile') ? 'active' : '' }}" href="{{ route('profile') }}">Profile</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('recipes') ? 'active' : '' }}" href="{{ route('recipes') }}">Recipes</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('favorites') ? 'active' : '' }}" href="{{ route('favorites') }}">Favorites</a>
    </li>
    <li class="nav-item">
        <a class="nav-link {{ Request::routeIs('filters') ? 'active' : '' }}" href="{{ route('filters') }}">Filters</a>
    </li>
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
            @csrf
            <button type="submit" class="btn btn-link nav-link logout-link">Logout</button>
        </form>
    </li>
</ul>

            </div>
        </nav>

        <main role="main" class="flex-fill py-4">
            @yield('content')
        </main>

        <footer class="text-center mt-auto">
            <p>© 2024 Recipe App. All rights reserved.</p>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
