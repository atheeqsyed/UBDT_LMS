@extends('layouts.app')

@section('content')
    <div class="container mx-auto p-6">
        <h1 class="text-3xl font-semibold mb-4">All Lectures/Materials</h1>

        @if($isAdmin) <!-- Check if the user is an admin -->
            <a href="#" data-toggle="modal" data-target="#uploadModal" class="btn upload-btn text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-4 mb-4 inline-block">
                Upload New Material
            </a>
        @endif

        <!-- Debugging: Check if materials are passed correctly -->
        <div>
            <h4 class="text-lg font-bold mb-4">Materials:</h4>
            @if($materials->isEmpty())
                <p>No materials available.</p>
            @else
                @foreach($materials as $material)
                    <div class="lecture-item bg-white p-4 rounded-lg shadow-md mb-4">
                        <h3 class="text-xl font-semibold">{{ $material->file_name }}</h3>
                        <p class="text-sm text-gray-500">Uploaded by: {{ $material->uploader->name }}</p>
                        <p class="text-sm text-gray-500">Uploaded on: {{ $material->created_at->format('F j, Y') }}</p>

                        @if($isAdmin) <!-- Only show delete for admin -->
                            <div class="mt-4">
                                <form action="{{ route('lectures.delete', $material->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn text-red-600 hover:text-red-700">Delete</button>
                                </form>
                            </div>
                        @endif

                        <!-- Provide a link to download the file -->
                        @if($material->file_path)
                            <a href="{{ route('lectures.download', $material->id) }}" class="btn mt-4 text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-4">
                                Download File
                            </a>
                        @else
                            <p class="text-gray-400 italic mt-4">Available Soon</p>
                        @endif
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Upload Modal -->
        <div class="modal fade" id="uploadModal" tabindex="-1" aria-labelledby="uploadModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <form action="{{ route('lectures.upload') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="uploadModalLabel">Upload New Material</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="file" class="block text-lg font-medium text-gray-700">Lecture File</label>
                            <input type="file" id="file" name="file" class="form-control w-full p-2 border-gray-300 rounded-md" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Upload</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
