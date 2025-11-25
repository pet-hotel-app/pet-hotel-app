<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::paginate(15);
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        return view('rooms.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'code' => 'required|string|unique:rooms,code',
            'type' => 'nullable|string',
            'capacity' => 'nullable|integer',
            'rate_per_day' => 'nullable|numeric',
            'status' => 'nullable|string',
        ]);

        Room::create($data);
        return redirect()->route('rooms.index')->with('success', 'Room created');
    }

    public function show(Room $room)
    {
        return view('rooms.show', compact('room'));
    }
}
