<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function index()
    {
        $owners = Owner::paginate(15);
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:owners,email',
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        Owner::create($data);
        return redirect()->route('owners.index')->with('success', __('messages.owner_created'));
    }

    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, Owner $owner)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:owners,email,' . $owner->id,
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
        ]);

        $owner->update($data);
        return redirect()->route('owners.index')->with('success', __('messages.owner_updated'));
    }

    public function destroy(Owner $owner)
    {
        $owner->delete();
        return redirect()->route('owners.index')->with('success', __('messages.owner_deleted'));
    }
}
