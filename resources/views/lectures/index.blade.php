@extends('layouts.app') <!-- Tells Laravel to use the layout file -->

@section('title', 'Lectures List') <!-- Optional title section -->

@section('content')
    <h1 class="text-2xl font-bold mb-4">Lectures List</h1>
    @if ($lectures->count())
        <ul class="list-disc pl-5">
            @foreach ($lectures as $lecture)
                <li>{{ $lecture->title }}</li>
            @endforeach
        </ul>
    @else
        <p>No lectures available.</p>
    @endif
@endsection
