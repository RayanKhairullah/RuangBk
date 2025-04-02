<?php

namespace App\Http\Controllers;

use App\Models\Room;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('jurusan')->get();
        return view('rooms.index', compact('rooms'));
    }

    public function create()
    {
        $jurusans = Jurusan::all();
        return view('rooms.create', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'tingkatan_rooms' => 'required|string|max:255',
        ]);

        $kode_rooms = strtoupper(Str::random(4)); // Generate kode unik

        Room::create([
            'jurusan_id' => $request->jurusan_id,
            'kode_rooms' => $kode_rooms,
            'tingkatan_rooms' => $request->tingkatan_rooms,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room created successfully.');
    }

    public function edit(Room $room)
    {
        $jurusans = Jurusan::all();
        return view('rooms.edit', compact('room', 'jurusans'));
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'jurusan_id' => 'required|exists:jurusans,id',
            'tingkatan_rooms' => 'required|string|max:255',
        ]);

        $room->update([
            'jurusan_id' => $request->jurusan_id,
            'tingkatan_rooms' => $request->tingkatan_rooms,
        ]);

        return redirect()->route('rooms.index')->with('success', 'Room updated successfully.');
    }

    public function destroy(Room $room)
    {
        $room->delete();

        return redirect()->route('rooms.index')->with('success', 'Room deleted successfully.');
    }
}
