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
            scroll-behavior: smooth;
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
   /* Hero Section */
.hero {
    display: flex;                       /* Enables flexbox layout */
    justify-content: center;             /* Centers content horizontally */
    align-items: center;                 /* Centers content vertically */
    background: url('/images/login-background.png') no-repeat center center fixed;
    background-size: cover;
    color: white;
    height: 81vh;                         /* Adjusted height for better footer visibility */
    width: 100%;                          /* Ensures hero section takes full width of the page */
    text-align: center;
    overflow: hidden;                    /* Hides any overflow */
    object-fit: cover;
}

/* Styling the content inside the hero section */
.hero div {
    max-width: 1400px;                   /* Limits the width of the content */
    padding: 20px;
    width: 100%;                          /* Ensures content takes full width up to max-width */
    
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
            background-color: #007bff;
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
        .section[style*="display: block"] {
    opacity: 1;
}

        .section {
            display: none;
    padding: 60px 20px;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    opacity: 0;
    transition: opacity 0.3s ease-in-out;
        }

        .form-control {
            border-radius: 8px;
            border: 1px solid #ddd;
            margin-bottom: 20px;
        }

        .btn-login, .btn-register {
            background-color: #007bff;
            color: white;
            font-size: 1.1rem;
            padding: 10px 20px;
            border-radius: 8px;
            width: 100%;
            font-weight: 600;
            letter-spacing: 0.5px;
        }

        .btn-login:hover, .btn-register:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #007bff;
            color: white;
            text-align: center;
            padding: 20px;
            position: fixed;
            bottom: 0;
            width: 100%;
            left: 0;
            z-index: 100;
        }

        /* Login Section - Enhancements */
        .login-form {
            max-width: 400px;
            width: 100%;
            margin: auto;
        }

        .login-form .card-body {
            padding: 20px;
        }

        .login-form h2 {
            font-size: 2rem;
            font-weight: 600;
            text-align: center;
            margin-bottom: 1.5rem;
            color: #333;
        }

        .login-form .form-group {
            margin-bottom: 1.5rem;
        }

        .login-form .form-control {
            padding: 12px 15px;
            font-size: 1rem;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        .login-form .btn-login {
            padding: 12px 15px;
            font-size: 1.1rem;
        }

        .btn-login {
    background-color: #007bff;
}
.btn-register {
    background-color: #28a745; /* Green color for register */
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
        <a class="navbar-brand" href="javascript:void(0)">Lecture Upload & Management</a>
        <div class="navbar-nav">
            <a class="nav-link" href="javascript:void(0)" id="homeTab">Home</a>
            <a class="nav-link" href="javascript:void(0)" id="howItWorksTab">How It Works</a>
            <a class="nav-link" href="javascript:void(0)" id="aboutTab">About</a>
            <a class="nav-link" href="javascript:void(0)" id="loginTab">Login</a>
            <a class="nav-link" href="javascript:void(0)" id="registerTab">Register</a> 
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
            <div class="container d-flex justify-content-center align-items-center" style="min-height: 60vh;">
                <div class="card shadow-lg login-form">
                    <div class="card-body">
                        <h2>Login to Your Account</h2>

                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <!-- Email Address -->
                            <div class="form-group">
                                <x-input-label for="email" :value="__('Email')" />
                                <x-text-input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                                <x-input-error :messages="$errors->get('email')" class="mt-2 text-sm text-red-500" />
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <x-input-label for="password" :value="__('Password')" />
                                <x-text-input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
                                <x-input-error :messages="$errors->get('password')" class="mt-2 text-sm text-red-500" />
                            </div>

                            <!-- Remember Me -->
                            <div class="form-group">
                                <label for="remember_me" class="inline-flex items-center text-sm">
                                    <input id="remember_me" type="checkbox" class="rounded text-indigo-600 focus:ring-indigo-500" name="remember">
                                    <span class="ms-2 text-gray-600">{{ __('Remember me') }}</span>
                                </label>
                            </div>

                            <div class="form-group d-flex justify-content-between align-items-center mb-6">
                                @if (Route::has('password.request'))
                                    <a class="underline text-sm text-indigo-600 hover:text-indigo-800" href="{{ route('password.request') }}">
                                        {{ __('Forgot your password?') }}
                                    </a>
                                @endif
                                <x-primary-button class="btn-login">
                                    {{ __('Log in') }}
                                </x-primary-button>
                            </div>
                        </form>

                        <!-- CTA to Register -->
                     <!--   <div class="text-center">
                            <p class="text-sm text-gray-600">
                                Don't have an account? 
                                <a href="{{ route('register') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">Register here</a>
                            </p>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="RegisterSection">
        <div class="container d-flex justify-content-center align-items-center" style="height: 67vh;">
        <!-- Card container for the registration form -->
        <div class="card" style="max-width: 500px; width: 100%; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-header text-center" style="background: linear-gradient(145deg, #6f42c1, #007bff); color: white; border-radius: 10px 10px 0 0;">
                <h4>Create Account</h4>
            </div>
            <div class="card-body" style="background-color: #f9f9f9;">
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Full Name Field -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Enter your full name" value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Email Field -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Enter your email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter a password" required>
                        @error('password')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Confirm Password Field -->
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm your password" required>
                    </div>

                    <!-- Role Field -->
                    <div class="mb-3">
                        <label for="role" class="form-label">Role</label>
                        <select name="role" id="role" class="form-select" required>
                            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
                            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                        @error('role')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-primary w-100" style="background-color: #007bff; border-radius: 8px; font-size: 1.1rem; padding: 12px;">Register</button>
                </form>
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
  // Function to reset all sections (hide them)
  function resetSections() {
        const sections = document.querySelectorAll('.section');
        sections.forEach(section => {
            section.style.display = 'none';
            section.style.opacity = 0; // Ensure opacity transitions smoothly when visible
        });
    }

    // Function to display the clicked section
    function showSection(sectionId) {
        resetSections(); // Hide all sections first
        const section = document.getElementById(sectionId);
        if (section) {
            section.style.display = 'block';
            setTimeout(() => { // Use setTimeout to allow the display change before applying opacity
                section.style.opacity = 1;
            }, 0);
        }
    }

    // Add event listeners to the navigation links
    document.getElementById('homeTab').addEventListener('click', function () {
        showSection('homeSection');
    });

    document.getElementById('howItWorksTab').addEventListener('click', function () {
        showSection('howItWorksSection');
    });

    document.getElementById('aboutTab').addEventListener('click', function () {
        showSection('aboutSection');
    });

    document.getElementById('loginTab').addEventListener('click', function () {
        showSection('loginSection');
    });

    document.getElementById('registerTab').addEventListener('click', function () {
        showSection('RegisterSection');
    });


    document.getElementById('homeTab').addEventListener('click', function () {
    resetSections(); // Reset all sections first
    document.getElementById('homeSection').style.display = 'block';
});

document.getElementById('howItWorksTab').addEventListener('click', function () {
    resetSections();
    document.getElementById('howItWorksSection').style.display = 'block';
});

document.getElementById('aboutTab').addEventListener('click', function () {
    resetSections();
    document.getElementById('aboutSection').style.display = 'block';
});

document.getElementById('loginTab').addEventListener('click', function () {
    resetSections();
    document.getElementById('loginSection').style.display = 'block';
});

document.getElementById('RegisterTab').addEventListener('click', function () {
    resetSections();
    document.getElementById('RegisterSection').style.display = 'block';
});

// Reset all sections to hide
function resetSections() {
    document.getElementById('homeSection').style.display = 'none';
    document.getElementById('howItWorksSection').style.display = 'none';
    document.getElementById('aboutSection').style.display = 'none';
    document.getElementById('loginSection').style.display = 'none';
    document.getElementById('RegisterSection').style.display = 'none';
}


const sections = document.querySelectorAll('.section');
const navLinks = document.querySelectorAll('.navbar .nav-link');

navLinks.forEach(link => {
    link.addEventListener('click', () => {
        sections.forEach(section => section.style.display = 'none'); // Hide all sections
        document.getElementById(link.id.replace('Tab', 'Section')).style.display = 'block'; // Show corresponding section
    });
});


document.querySelectorAll('.nav-link').forEach((item) => {
    item.addEventListener('click', function () {
        document.querySelectorAll('.nav-link').forEach(link => link.classList.remove('active'));
        this.classList.add('active');
    });
});


    </script>
</body>

</html>
