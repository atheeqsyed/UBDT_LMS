<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LectureController;


Route::get('/lectures', [LectureController::class, 'index'])->name('lectures.index');


// Example in routes/web.php
Route::get('/lectures/{id}', [LectureController::class, 'show'])->name('lectures.show');


Route::get('/lectures', [LectureController::class, 'index']);  // Handle lectures with controller

Route::get('/', function () {
    return view('welcome');
});
