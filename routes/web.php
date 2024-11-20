<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

// General routes
Route::get('/', function () {
    return view('welcome');
});

// Registration routes
Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.store');

// Authenticated user routes
Route::middleware(['auth'])->group(function () {
    // Dashboard route
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Materials routes (can be used by both admins and students)
    Route::post('/upload-material', [MaterialController::class, 'store'])->name('upload.material');
    Route::get('/download-material/{id}', [MaterialController::class, 'download'])->name('download.material');
});

// Admin-specific routes (Role-based route middleware)
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Manage lectures routes (admin only)
    Route::resource('lectures', LectureController::class);
    
    // Admin can manage materials (if needed)
    Route::prefix('lectures')->group(function () {
        Route::post('/upload', [MaterialController::class, 'uploadMaterial'])->name('lectures.upload');
        Route::delete('{id}', [MaterialController::class, 'deleteMaterial'])->name('lectures.delete');
    });
});

// Student-specific routes (Role-based route middleware)
Route::middleware(['auth', 'role:student'])->group(function () {
    // Students can view lectures and download them
    Route::get('/lectures', [LectureController::class, 'index'])->name('lectures.index');
    Route::get('/lectures/{id}/download', [LectureController::class, 'download'])->name('lectures.download');
});

// Route for creating a lecture (Only for admin users)
Route::middleware(['auth', 'role:admin'])->get('/lectures/create', [LectureController::class, 'create'])->name('lectures.create');


// Edit Route
Route::get('/lectures/{lecture}/edit', [LectureController::class, 'edit'])->name('lectures.edit');

// Update Route
Route::put('/lectures/{lecture}', [LectureController::class, 'update'])->name('lectures.update');

// Delete Route
Route::delete('/lectures/{lecture}', [LectureController::class, 'destroy'])->name('lectures.destroy');


Route::post('/lectures/upload', [LectureController::class, 'upload'])->name('lectures.upload');
Route::delete('/lectures/{id}', [LectureController::class, 'destroy'])->name('lectures.delete');
Route::get('/lectures/{id}/download', [LectureController::class, 'download'])->name('lectures.download');

// routes/web.php
Route::get('/lectures/create', [LectureController::class, 'create'])->name('lectures.create');

// routes/web.php
Route::put('/lectures/{id}', [LectureController::class, 'update'])->name('lectures.update');


// routes/web.php
Route::get('/lectures', [LectureController::class, 'index'])->name('lectures.index');
Route::get('/lectures/create', [LectureController::class, 'create'])->name('lectures.create');
Route::post('/lectures', [LectureController::class, 'store'])->name('lectures.store'); // For storing the new lecture
Route::get('/lectures/{id}/edit', [LectureController::class, 'edit'])->name('lectures.edit');
Route::put('/lectures/{id}', [LectureController::class, 'update'])->name('lectures.update');
// Route::delete('/lectures/{id}', [LectureController::class, 'destroy'])->name('lectures.delete');


Route::put('/lectures/{lecture}', [LectureController::class, 'update'])->name('lectures.update');



// Auth routes (Login, Registration, etc.)
require __DIR__ . '/auth.php';
