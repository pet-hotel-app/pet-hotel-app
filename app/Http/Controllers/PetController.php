<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Owner;
use Illuminate\Http\Request;

class PetController extends Controller
{
    public function index()
    {
        $pets = Pet::with('owner')->paginate(15);
        return view('pets.index', compact('pets'));
    }

    public function create()
    {
        $owners = Owner::all();
        return view('pets.create', compact('owners'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'name' => 'required|string|max:255',
            'species' => 'nullable|string',
            'breed' => 'nullable|string',
            'age' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        Pet::create($data);
        return redirect()->route('pets.index')->with('success', 'Pet added successfully!');
    }

    public function show(Pet $pet)
    {
        return view('pets.show', compact('pet'));
    }

    public function edit(Pet $pet)
    {
        $owners = Owner::all();
        return view('pets.edit', compact('pet', 'owners'));
    }

    public function update(Request $request, Pet $pet)
    {
        $data = $request->validate([
            'owner_id' => 'required|exists:owners,id',
            'name' => 'required|string|max:255',
            'species' => 'nullable|string',
            'breed' => 'nullable|string',
            'age' => 'nullable|integer',
            'notes' => 'nullable|string',
        ]);

        $pet->update($data);
        return redirect()->route('pets.index')->with('success', 'Pet updated successfully!');
    }

    public function destroy(Pet $pet)
    {
        $pet->delete();
        return redirect()->route('pets.index')->with('success', 'Pet deleted successfully!');
    }
}
