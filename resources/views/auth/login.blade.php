@extends('layouts.layout')

@section('title', 'Login')

@section('content')
    <style>
        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
        }

        .card-header {
            background: linear-gradient(135deg, #4e54c8, #8f94fb);
            color: #fff;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn-primary {
            background-color: #6a11cb;
            border-color: #6a11cb;
        }

        .btn-primary:hover {
            background-color: #2575fc;
            border-color: #2575fc;
        }

        a {
            color: #6a11cb;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Welcome Back</h4>
                        <p class="mb-0">Please log in to your account</p>
                    </div>
                    <div class="card-body">
                        <!-- Session Status -->
                        @if (session('status'))
                            <div class="alert alert-success mb-4">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- Login Form -->
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control"
                                       value="{{ old('email') }}" required autofocus>
                                @error('email')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Password -->
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" id="password" name="password" class="form-control" required>
                                @error('password')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <!-- Remember Me -->
                            <div class="form-check mb-3">
                                <input type="checkbox" id="remember_me" name="remember" class="form-check-input">
                                <label for="remember_me" class="form-check-label">Remember me</label>
                            </div>

                            <!-- Actions -->
                            <div class="d-flex justify-content-between align-items-center">
                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}">Forgot your password?</a>
                                @endif
                                <button type="submit" class="btn btn-primary">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="text-center mt-3">
                    <p class="text-white">Don't have an account?
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-light">Register</a>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
