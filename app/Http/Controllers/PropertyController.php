<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property; // Assuming you have a Property model

class PropertyController extends Controller
{
    public function createForm()
    {
        return view('properties.create');
    }
    public function store(Request $request)
    {
        // Validate form data
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'bedrooms' => 'required|integer',
            'bathrooms' => 'required|integer',
            'location' => 'required|string|max:255',
            'price' => 'required|numeric',
            'type' => 'required|in:House,Apartment',
            'description' => 'nullable|string|max:1000',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // To store the uploaded photo
        $photoPath = $request->file('photo')->store('photos');

        // To create a new property record
        $property = new Property();
        $property->title = $validatedData['title'];
        $property->bedrooms = $validatedData['bedrooms'];
        $property->bathrooms = $validatedData['bathrooms'];
        $property->location = $validatedData['location'];
        $property->price = $validatedData['price'];
        $property->type = $validatedData['type'];
        $property->description = $validatedData['description'];
        $property->photo = $photoPath;
        $property->save();

        // Success message
        return redirect()->route('properties.index')->with('success', 'Property added successfully!');
    }
    //Method to display a list of all properties
    public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

    // Method to display aspecific property's details
    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }
}
