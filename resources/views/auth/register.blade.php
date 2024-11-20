@extends('layouts.app') <!-- Assuming you're using a base layout -->

@section('content')
    <!-- Main container, centered both vertically and horizontally -->
    <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
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
@endsection
