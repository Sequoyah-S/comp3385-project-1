@extends('layouts.app')

@section('content')
    <div>
        <img src="{{ asset($property->photo) }}" alt="{{ $property->title }}" width="200">
        <h2>{{ $property->title }}</h2>
        <p>{{ $property->description }}</p>
        <p>Location: {{ $property->location }}</p>
        <p>Price: ${{ $property->price }}</p>
        <p>Bedrooms: {{ $property->bedrooms }}</p>
        <p>Bathrooms: {{ $property->bathrooms }}</p>
        <p>Type: {{ $property->type }}</p>
        <a href="#">Email Realtor</a>
    </div>
@endsection
