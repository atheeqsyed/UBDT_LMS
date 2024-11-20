@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-8 max-w-2xl bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center text-gray-800 dark:text-white mb-6">
            📚 Upload New Lecture Material
        </h1>

        <form action="{{ route('lectures.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <!-- Lecture Title Input -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Lecture Title</label>
                <input type="text" id="title" name="title" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all" 
                    placeholder="Enter the title of the lecture" required>
            </div>

            <!-- Subject Input -->
            <div class="mb-4">
                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Lecture Subject</label>
                <input type="text" id="subject" name="subject" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all" 
                    placeholder="Enter the subject of the lecture" required>
            </div>

            <!-- File Upload Input -->
            <div class="mb-4">
                <label for="file" class="block text-sm font-medium text-gray-700 dark:text-white mb-2">Lecture File (PDF)</label>
                <input type="file" id="file" name="file" 
                    class="w-full p-3 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-indigo-500 transition-all" 
                    required>
            </div>

            <!-- Submit Button -->
            <div class="flex justify-center">
                <button type="submit" class="w-full py-2 bg-indigo-600 text-white font-semibold rounded-md shadow-md hover:bg-indigo-600 focus:outline-none focus:ring-1 focus:ring-indigo-500 transition-all">
                    Upload Lecture
                </button>
            </div>
        </form>
    </div>
@endsection
