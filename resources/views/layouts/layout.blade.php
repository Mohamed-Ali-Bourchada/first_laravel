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
</head>
<body class="antialiased">

<header class="bg-dark text-white py-3">
    <div class="container d-flex justify-content-between align-items-center">
        <!-- Logo -->
        <div class="logo">
            <h1 class="h4 mb-0">My Website</h1>
        </div>

        <!-- Main Navigation -->
        <nav class="navbar navbar-expand-lg navbar-dark">
            <ul class="navbar-nav">
                <li class="nav-item"><a class="nav-link" href="{{ url('home') }}">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('about') }}">About</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('service') }}">Services</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('contact') }}">Contact</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('matiere') }}">Matieres</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('epreuve') }}">Epreuves</a></li>
            </ul>
        </nav>

        <!-- User Authentication Section (Fixed at the top-right) -->
        <div class="user-auth">
            @if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-3 text-right">
                    @auth
                        <div class="d-flex align-items-center">
                            <span class="text-white me-3">{{ Auth::user()->name }}</span>
                            
                            <!-- Profile link -->
                            <a href="{{ route('profile.edit') }}" class="btn btn-outline-light btn-sm me-2">
                                Profile
                            </a>
                            
                            <!-- Logout -->
                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-light btn-sm">
                                    Log Out
                                </button>
                            </form>
                        </div>
                    @else
                        <div class="d-flex">
                            <!-- Trigger the Modal -->
                            <button class="btn btn-outline-light btn-sm me-2" data-bs-toggle="modal" data-bs-target="#loginModal">
                                Log In
                            </button>
                            
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-light btn-sm">
                                    Register
                                </a>
                            @endif
                        </div>
                    @endauth
                </div>
            @endif
        </div>
    </div>
</header>

<!-- Modal HTML Structure -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="loginModalLabel">Log In</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Login Form -->
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Log In</button>
        </form>
      </div>
    </div>
  </div>
</div>

<main class="container mt-4">
    @yield('content')
</main>

<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-5gYvXk5/suMSEJ5C5tQmJdZ2b8GgqZtN1kJNZDfsbIH5aP2O2QR+B4mUIuHhyDcu" crossorigin="anonymous"></script>

</body>
</html>
