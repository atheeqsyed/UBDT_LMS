<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // This method handles the dashboard view for authenticated users
    public function index()
    {
      $lectures = Lecture::all();
      $userRole = auth()->user()->role;  // Get the role of the logged-in user
      return view('dashboard', compact('lectures', 'userRole'));
    }
    
}
