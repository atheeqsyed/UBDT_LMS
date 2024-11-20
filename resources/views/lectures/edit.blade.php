@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12 max-w-lg bg-white shadow-xl rounded-lg">
        <h1 class="text-2xl font-bold text-center text-gray-900 dark:text-white mb-6">
            Edit Lecture Details 📝
        </h1>

        <form action="{{ route('lectures.update', $lecture->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <!-- Lecture Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Lecture Title</label>
                <input type="text" id="title" name="title" value="{{ old('title', $lecture->title) }}" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>

            <!-- Subject Input -->
            <div class="mb-4">
                <label for="subject" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Subject</label>
                <input type="text" id="subject" name="subject" value="{{ old('subject', $lecture->subject) }}" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>

            <!-- Upload Date Input -->
            <div class="mb-4">
                <label for="upload_date" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload Date</label>
                <input type="date" id="upload_date" name="upload_date" value="{{ old('upload_date', $lecture->upload_date) }}" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300" required>
            </div>

            <!-- Display Current PDF File (if any) -->
            @if($lecture->file_path)
                <div class="mb-4">
                    <label class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Current PDF</label>
                    <a href="{{ asset('storage/' . $lecture->file_path) }}" target="_blank" 
                        class="text-blue-600 hover:text-blue-800 transition-colors duration-300">View Current PDF</a>
                </div>
            @endif

            <!-- File Upload Input (Optional) -->
            <div class="mb-4">
                <label for="file" class="block text-sm font-semibold text-gray-900 dark:text-white mb-2">Upload New PDF (Optional)</label>
                <input type="file" name="file" 
                    class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 transition duration-300">
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-full py-2 bg-blue-500 text-white font-semibold rounded-lg shadow-md hover:bg-blue-400 transition-all duration-300">
                    Update Lecture
                </button>
            </div>
        </form>
    </div>
@endsection
