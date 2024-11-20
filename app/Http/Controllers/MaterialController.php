<?php

// app/Http/Controllers/MaterialController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Material;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class MaterialController extends Controller
{
    public function dashboard()
    {
        $materials = Material::all();  // Fetch all materials

        // Check if the logged-in user is an admin
        $isAdmin = Auth::user()->role === 'admin';

        return view('dashboard', compact('materials', 'isAdmin')); // Pass the role check to the view
    }

    // Upload new material (only for admin users)
    public function upload(Request $request)
{
    $request->validate([
        'file' => 'required|mimes:pdf,doc,docx,ppt,pptx|max:10240', // Customize allowed file types and size
    ]);

    $file = $request->file('file');
    $filePath = $file->storeAs('lectures', $file->getClientOriginalName(), 'public');

    // Create a new material entry in the database
    Material::create([
        'file_name' => $file->getClientOriginalName(),
        'file_path' => $filePath,
        'uploaded_by' => auth()->user()->id,
    ]);

    return redirect()->route('lectures.index')->with('success', 'Material uploaded successfully.');
}
    // Delete material (only for admin users)
    public function destroy($id)
    {
        $material = Material::findOrFail($id);
    
        // Delete the file from the storage
        Storage::disk('public')->delete($material->file_path);
    
        // Delete the material record
        $material->delete();
    
        return redirect()->route('lectures.index')->with('success', 'Material deleted successfully.');
    }

    public function download($id)
{
    $material = Material::findOrFail($id);

    // Return the file as a download response
    return response()->download(storage_path('app/public/' . $material->file_path));
}
}
