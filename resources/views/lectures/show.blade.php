@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 py-6">
    <div class="bg-white rounded-lg shadow p-6">
        <h2 class="text-2xl font-bold mb-4">{{ $lecture->title }}</h2>
        <p class="text-gray-700">{{ $lecture->description }}</p>
        <p class="text-gray-600 mt-2"><strong>Subject:</strong> {{ $lecture->subject }}</p>
        <p class="text-sm text-gray-500 mt-1">Uploaded on: {{ $lecture->created_at->format('M d, Y') }}</p>
        <div class="mt-4">
            <a href="{{ route('lectures.download', $lecture->id) }}" class="bg-green-500 text-white px-4 py-2 rounded">
                Download File
            </a>
        </div>
    </div>

    <div class="mt-8">
        <h3 class="text-xl font-bold mb-4">Related Lectures</h3>
        @if($relatedLectures->isNotEmpty())
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($relatedLectures as $related)
                    <div class="bg-gray-100 rounded-lg shadow p-4">
                        <h4 class="font-semibold">{{ $related->title }}</h4>
                        <p class="text-gray-600">{{ $related->subject }}</p>
                        <a href="{{ route('lectures.show', $related->id) }}" class="text-blue-500 mt-2 inline-block">
                            View Details
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <p>No related lectures available.</p>
        @endif
    </div>
</div>
@endsection
