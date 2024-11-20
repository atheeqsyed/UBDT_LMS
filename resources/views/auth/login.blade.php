<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lecture Upload and Management System</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body, html {
            height: 100%;
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f7fc;
        }

        .content {
            display: flex;
            flex-direction: column;
            padding-bottom: 60px; /* Space for the footer */
            flex-grow: 1;
        }

        /* Hero Section */
        .hero {
            background: url('/images/login-background.png') no-repeat center center fixed;
            background-size: cover;
            color: whitesmoke;
            height: 81vh; /* Reduced height for better footer visibility */
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            overflow: hidden;
        }

        .hero::after {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: inherit;
            background-size: cover;
            background-position: center;
            z-index: -1;
        }

        .navbar {
            background-color: #007bff; /* Blue color */
            padding: 15px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar a {
            color: white;
            font-weight: 600;
            margin-right: 20px;
            text-decoration: none;
        }

        .navbar a:hover {
            color: #f8f9fa;
            text-decoration: underline;
        }

        .section {
            display: none;
            padding: 60px 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .btn-login, .btn-register {
            background-color: #007bff; /* Blue color */
            color: white;
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 8px;
            width: 100%;
        }

        .btn-login:hover, .btn-register:hover {
            background-color: #0056b3; /* Darker blue */
        }

        footer {
            background-color: #007bff; /* Blue color */
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            left: 0;
            z-index: 100;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            footer {
                padding: 15px;
            }

            .hero {
                height: 50vh; /* Reduce the height even more for smaller screens */
            }

            .section {
                padding: 40px 10px;
            }
        }
    </style>
</head>

<body>
    <!-- Navigation Menu -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">Lecture Upload & Management</a>
        <div class="navbar-nav">
            <a class="nav-link" href="javascript:void(0)" id="homeTab">Home</a>
            <a class="nav-link" href="javascript:void(0)" id="howItWorksTab">How It Works</a>
            <a class="nav-link" href="javascript:void(0)" id="aboutTab">About</a>
            <a class="nav-link" href="javascript:void(0)" id="loginTab">Login</a>
            <a class="nav-link" href="http://127.0.0.1:8000/register" id="registerTab">Register</a> <!-- Register button -->
        </div>
    </nav>

    <div class="content">
        <!-- Hero Section -->
        <section class="hero" id="homeSection">
            <div>
                <h1>Effortless Lecture Management</h1>
                <p>Upload, organize, and access your lecture materials with ease.</p>
            </div>
        </section>

        <!-- About Section -->
        <section class="section" id="aboutSection">
            <div class="container">
                <h2>About the Project</h2>
                <p>This project is designed to allow users to upload, manage, and download lectures in a web application...</p>
            </div>
        </section>

        <!-- How It Works Section -->
        <section class="section" id="howItWorksSection">
            <div class="container">
                <h2>How It Works</h2>
                <p>The Lecture Upload and Management System allows users to upload, organize, and access their lecture materials seamlessly.</p>
            </div>
        </section>

        <!-- Login Section -->
        <section class="section" id="loginSection">
            <div class="login-background" style="background-image: url('/images/login-background.png'); background-size: cover; background-position: center; min-height: calc(100vh - 100px); display: flex; justify-content: center; align-items: center;">
                <!-- Login Form -->
                <div class="max-w-md mx-auto p-6 bg-white border rounded-lg shadow-lg opacity-90 mt-16">
                    <h2 class="text-3xl font-semibold text-center text-gray-800 mb-8">Login to Your Account</h2>
                    
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div class="mb-6">
                            <x-input-label for="email" :value="__('Email')" />
                            <x-text-input id="email" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <!-- Password -->
                        <div class="mb-6">
                            <x-input-label for="password" :value="__('Password')" />
                            <x-text-input id="password" class="block mt-1 w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500" 
                                type="password" name="password" required autocomplete="current-password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                        </div>

                        <!-- Remember Me -->
                        <div class="flex items-center mb-6">
                            <label for="remember_me" class="inline-flex items-center text-sm">
                                <input id="remember_me" type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500" name="remember">
                                <span class="ms-2 text-gray-600">{{ __('Remember me') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center justify-between mb-6">
                            @if (Route::has('password.request'))
                                <a class="underline text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                                    {{ __('Forgot your password?') }}
                                </a>
                            @endif
                            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-3 rounded-lg text-lg font-semibold">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>

                    <!-- CTA to Register -->
                    <div class="text-center">
                        <p class="text-sm text-gray-600">
                            Don't have an account? 
                            <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Register here</a>
                        </p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Footer Section -->
    <footer>
        <p>© 2024 Athiba. All rights reserved.</p>
    </footer>

    <!-- Script for Section Display -->
    <script>
        document.getElementById('homeTab').addEventListener('click', function () {
            displaySection('home');
        });
        document.getElementById('howItWorksTab').addEventListener('click', function () {
            displaySection('howItWorks');
        });
        document.getElementById('aboutTab').addEventListener('click', function () {
            displaySection('about');
        });
        document.getElementById('loginTab').addEventListener('click', function () {
            displaySection('login');
        });

        function displaySection(sectionName) {
            document.querySelectorAll('.section').forEach(function (section) {
                section.style.display = 'none';
            });

            document.getElementById(sectionName + 'Section').style.display = 'block';
        }

        displaySection('home'); // Default section displayed
    </script>
</body>

</html>
