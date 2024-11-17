<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class LectureController extends Controller
{
    public function index()
    {
        $lectures = Lecture::all(); // You can replace `all()` with pagination if needed

        return view('lectures.index', compact('lectures'));
    }

    public function show($id)
{
    $lecture = Lecture::findOrFail($id); // Fetch lecture by ID
    return view('lectures.show', compact('lecture'));
}
}
