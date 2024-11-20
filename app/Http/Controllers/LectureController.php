<?php

namespace App\Http\Controllers;

use App\Models\Lecture;
use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Storage;

class LectureController extends Controller
{

    public function create()
{
    // Optionally pass data to the view if needed
    return view('lectures.create'); // Create a new view file for the form
}
    // Method to display the edit form
    public function edit(Lecture $lecture)
    {
        // Ensure only admin can access
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home'); // Redirect if not an admin
        }

        return view('lectures.edit', compact('lecture'));
    }

    // Method to update a lecture
   // app/Http/Controllers/LectureController.php
   public function update(Request $request, $id)
    {
        // The logic for updating the lecture goes here
        $lecture = Lecture::findOrFail($id);

        // Validate the form fields
        $request->validate([
            'title' => 'required|string|max:255',
            'subject' => 'required|string|max:255',
            'upload_date' => 'required|date',
            'file' => 'nullable|mimes:pdf|max:10240', // Max file size 10MB
        ]);

        // Update the lecture details
        $lecture->title = $request->title;
        $lecture->subject = $request->subject;
        $lecture->upload_date = $request->upload_date;

        // Handle file upload if a new file is provided
        if ($request->hasFile('file')) {
            // Delete the old file if it exists
            if ($lecture->file_path) {
                Storage::delete('public/' . $lecture->file_path);
            }

            // Store the new file and update the file_path
            $filePath = $request->file('file')->store('lectures', 'public');
            $lecture->file_path = $filePath;
        }

        // Save the lecture
        $lecture->save();

        // Redirect or return a response
        return redirect()->route('lectures.index')->with('success', 'Lecture updated successfully!');
    }

    // Method to delete a lecture
    public function destroy(Lecture $lecture)
    {
        // Ensure only admin can delete lectures
        if (auth()->user()->role !== 'admin') {
            return redirect()->route('home'); // Redirect if not an admin
        }

        // Delete the lecture record
        $lecture->delete();

        // Redirect back to the dashboard or lecture list
        return redirect()->route('lectures.index')->with('success', 'Lecture deleted successfully!');
    }
}
