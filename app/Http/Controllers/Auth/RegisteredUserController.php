<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;

class RegisteredUserController extends Controller
{
    // Show the registration form (GET request)
    public function create()
    {
        return view('auth.register'); // Replace with the appropriate view
    }

    // Handle the form submission (POST request)
    public function store(Request $request)
    {
        // Validate the input data, including the role
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', 'min:8'],
            'role' => ['required', 'in:admin,student'],  // Validate role as either admin or student
        ]);

        // Create the user with the validated data
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],  // Store the role in the user table
        ]);

        // After user is created, log them in and redirect
        auth()->login($user);

        return redirect()->route('dashboard');
    }
}
