@extends('layouts.app')

@section('content')
    <h2>List of Properties</h2>
    <ul>
        @foreach ($properties as $property)
            <li>
                <img src="{{ asset($property->photo) }}" alt="{{ $property->title }}" width="100">
                <h3>{{ $property->title }}</h3>
                <p>{{ $property->location }}</p>
                <p>Price: ${{ $property->price }}</p>
                <a href="{{ route('properties.show', $property->id) }}">View Details</a>
            </li>
        @endforeach
    </ul>
@endsection
