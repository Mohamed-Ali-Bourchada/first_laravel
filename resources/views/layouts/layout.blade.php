<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Google Font (Figtree) -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Figtree', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .header {
            background: linear-gradient(135deg, #0062cc, #004085);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px 0;
        }

        .header .navbar {
            padding: 0;
        }

        .header .logo h1 {
            color: #fff;
            font-size: 1.8rem;
            margin: 0;
        }

        .navbar-nav .nav-link {
            color: #fff !important;
            font-weight: 500;
            text-transform: uppercase;
            margin-right: 15px;
        }

        .navbar-nav .nav-link:hover {
            color: #ffc107 !important;
        }

        .user-auth a, .user-auth button {
            color: #fff;
        }

        .user-auth a:hover, .user-auth button:hover {
            color: #ddd;
        }

        main {
            flex-grow: 1;
            padding: 40px 15px;
            background-color: #ffffff;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.05);
            border-radius: 8px;
            margin-bottom: 60px;
        }

        footer {
            background-color: #343a40;
            color: #fff;
            padding: 1rem 0;
            position: relative;
            bottom: 0;
            width: 100%;
        }

        footer a {
            color: #adb5bd;
            text-decoration: none;
        }

        footer a:hover {
            color: #ffc107;
        }

        .bottom-fixed {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            z-index: 99;
        }

        .footer-links {
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .footer-links a {
            color: #adb5bd;
            text-decoration: none;
            transition: color 0.3s ease;
        }

        .footer-links a:hover {
            color: #ffc107;
        }
        .user-auth .btn {
    background: linear-gradient(135deg, #ffc107, #ff6600);
    color: #fff;
    border: none;
    border-radius: 25px;
    padding: 8px 20px;
    font-size: 0.9rem;
    font-weight: bold;
    transition: all 0.3s ease-in-out;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
}

.user-auth .btn:hover {
    background: linear-gradient(135deg, #ff6600, #ffc107);
    color: #fff;
    transform: scale(1.05);
    box-shadow: 0 6px 8px rgba(0, 0, 0, 0.3);
}

.user-auth .btn:focus {
    outline: none;
    box-shadow: 0 0 8px rgba(255, 99, 0, 0.6);
}

    </style>
</head>

<body class="antialiased">

    <header class="header">
        <div class="container d-flex justify-content-between align-items-center">
            <!-- Logo -->
            <div class="logo">
                <h1>My Website</h1>
            </div>

            <!-- Main Navigation -->
            <nav class="navbar navbar-expand-lg navbar-dark">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item"><a class="nav-link" href="{{ url('home') }}">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('service') }}">Services</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('matiere') }}">Matieres</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('epreuve') }}">Epreuves</a></li>
                    </ul>
                </div>
            </nav>

            <!-- User Authentication Section -->
            <div class="user-auth">
    @if (Route::has('login'))
        <div class="text-end">
            @auth
                <div class="d-flex align-items-center">
                    <span class="text-white me-3">{{ Auth::user()->name }}</span>
                    <a href="{{ route('profile.edit') }}" class="btn btn-sm me-2">Profile</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-sm">Log Out</button>
                    </form>
                </div>
            @else
                <div class="d-flex">
                    <a href="{{ route('login') }}" class="btn btn-sm me-2">Log In</a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="btn btn-sm">Register</a>
                    @endif
                </div>
            @endauth
        </div>
    @endif
</div>

        </div>
    </header>

    <main class="container mt-5">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bottom-fixed">
        <div class="container text-center">
            <p class="mb-2">© 2024 My Website. All Rights Reserved.</p>
            <div class="footer-links">
                <a href="{{ url('privacy-policy') }}">Privacy Policy</a>
                <a href="{{ url('terms') }}">Terms of Service</a>
                <a href="{{ url('contact') }}">Contact Us</a>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-5gYvXk5/suMSEJ5C5tQmJdZ2b8GgqZtN1kJNZDfsbIH5aP2O2QR+B4mUIuHhyDcu"
        crossorigin="anonymous"></script>

</body>

</html>
