@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-6 py-12">
        
        <!-- Dashboard Header -->
        <div class="text-center mb-12">
            <h1 class="text-2xl sm:text-1xl font-extrabold text-gray-1000 dark:text-white leading-tight">
                @if (auth()->user()->role == 'admin')
                   
                   
               Welcome Back!, Manage materials and Content to keep your students up-to-date.
                @elseif (auth()->user()->role == 'student') 
                  Welcome, Back!.  Access your lectures anytime and stay updated on your coursework.
                @else
                    Welcome to the Dashboard
                @endif
            </h1>
         <!--   <p class="mt-3 text-gray-600 dark:text-gray-300 text-lg max-w-xl mx-auto">
                @if (auth()->user()->role == 'admin')
                    Manage lectures and content for students.
                @elseif (auth()->user()->role == 'student')
                    Explore and access your lectures to stay on track.
                @else
                    Here’s what’s new in your dashboard.
                @endif
            </p> -->
        </div>

        <!-- Admin Specific Section: Upload Button -->
        @if(auth()->user()->role === 'admin')
            <div class="text-center mb-10">
           <!-- <a href="{{ route('lectures.create') }}" class="btn upload-btn text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-4 mb-4 inline-block">
    Upload New Material
</a> -->
                <a href="{{ route('lectures.create') }}" 
                   class="inline-flex items-center px-3 py-1.5 bg-gradient-to-r from-blue-400 to-indigo-700 text-white font-semibold rounded-lg shadow-xl focus:outline-none focus:ring-3 focus:ring-indigo-300 transition-all duration-300">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M12 4v16m8-8H4" />
                    </svg>
                    Upload New Lecture
                </a>
            </div>
        @endif

        <!-- Lectures Section for Admin -->
        <div class="mt-10">
            @if (auth()->user()->role === 'admin')
                <!-- Admin Specific Cards for Lecture Management -->
          <!--      <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-white mb-6">
                    Manage Lectures 📝
                </h2>
                <p class="text-center text-gray-500 dark:text-gray-400 mb-8">
                    Add, update, or remove lecture materials to keep your students up-to-date.
                </p> -->

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($lectures as $lecture)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8 transition-all duration-300">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $lecture->title }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                <span class="font-medium">Subject:</span> {{ $lecture->subject }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-medium">Uploaded On:</span> {{ $lecture->upload_date }}
                            </p>

                            @if ($lecture->file_path)
    <div class="mt-4 flex items-center space-x-3">
        <img src="{{ asset('icons/pdf.png') }}" alt="PDF Icon" class="w-6 h-6">
        <a href="{{ asset('storage/' . $lecture->file_path) }}" target="_blank" 
           class="text-blue-600 font-semibold underline hover:text-blue-800">
            View Lecture PDF
        </a>
    </div>
@else
    <p class="text-gray-400 italic mt-4">Available Soon</p>
@endif

                            <div class="mt-6 flex space-x-4">
                                <a href="{{ route('lectures.edit', $lecture->id) }}" 
                                   class="inline-flex items-center px-6 py-2 bg-yellow-500 text-white font-semibold rounded-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                                    Edit
                                </a>
                                <form action="{{ route('lectures.destroy', $lecture->id) }}" method="POST" class="inline-flex ml-2">
    @csrf
    @method('DELETE')
    <button type="submit" class="inline-flex items-center px-6 py-2 bg-red-600 text-white font-semibold rounded-lg transition-all duration-300 focus:outline-none focus:ring-4 focus:ring-red-300">
        Delete
    </button>
</form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @elseif (auth()->user()->role === 'student')
                <!-- Student Specific Cards for Viewing Lectures -->
            <!--    <h2 class="text-3xl font-extrabold text-center text-gray-900 dark:text-white mb-6">
                    Your Lectures 📚
                </h2>
                <p class="text-center text-gray-500 dark:text-gray-400 mb-8">
                    Access your lectures anytime and stay updated on your coursework.
                </p> -->

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach ($lectures as $lecture)
                        <div class="bg-white dark:bg-gray-800 rounded-2xl shadow-lg p-8">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                {{ $lecture->title }}
                            </h3>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-2">
                                <span class="font-medium">Subject:</span> {{ $lecture->subject }}
                            </p>
                            <p class="text-sm text-gray-500 dark:text-gray-400">
                                <span class="font-medium">Uploaded On:</span> {{ $lecture->upload_date }}
                            </p>

                            @if ($lecture->file_path)
                                <div class="mt-4 flex items-center space-x-3">
                                    <img src="{{ asset('icons/pdf.png') }}" alt="PDF Icon" class="w-6 h-6">
                                    <a href="{{ asset('storage/' . $lecture->file_path) }}" target="_blank" 
                                       class="text-blue-600 font-semibold underline hover:text-blue-800">
                                        View Lecture PDF
                                    </a>
                                </div>
                            @else
                                <p class="text-gray-400 italic mt-4">Available Soon</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </div>
@endsection
