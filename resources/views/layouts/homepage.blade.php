<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&family=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/homepage.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
   
        html, body {
            height: 100%;
            margin: 0;
            display: flex;
            overflow: hidden;
            flex-direction: column;
            background-image: url('{{ asset('images/food.jpg') }}'); 
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
        }

        .container {
            flex: 1;
        }

        footer {
            background-color: #f8f9fa; 
            padding: 1rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer p {
            margin: 0;
        }
    </style>
</head>
<body>
    <main role="main" class="container py-4">
        @yield('content')
    </main>

    <footer class="text-center">
        <p>© 2024 Recipe App. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>