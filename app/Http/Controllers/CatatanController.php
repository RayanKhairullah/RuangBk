<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Enums\UserRole;

class CatatanController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === UserRole::Teacher) {
            $catatans = Catatan::with(['user', 'room', 'guru'])->get();
        } else {
            $catatans = Catatan::with(['user', 'room', 'guru'])
                ->where('user_id', Auth::id())
                ->get();
        }
            
        return view('catatans.index', compact('catatans'));
    }

    public function create()
    {
        if (Auth::user()->role !== UserRole::Teacher) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::where('role', UserRole::User)->get(); // ambil siswa saja
        $rooms = Room::all();
        return view('catatans.create', compact('users', 'rooms'));
    }

    public function store(Request $request)
    {
        if (Auth::user()->role !== UserRole::Teacher) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'kasus' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'catatan_guru' => 'required|string',
            'poin' => 'required|integer|in:10,20,30,40,50,60,70,80,90,100',
        ]);

        Catatan::create([
            'user_id' => $request->user_id,
            'room_id' => $request->room_id,
            'guru_id' => Auth::id(),
            'kasus' => $request->kasus,
            'tanggal' => $request->tanggal,
            'catatan_guru' => $request->catatan_guru,
            'poin' => $request->poin,
        ]);

        return redirect()->route('catatans.index')->with('success', 'Catatan berhasil dibuat.');
    }

    public function edit(Catatan $catatan)
    {
        if (Auth::user()->role !== UserRole::Teacher) {
            abort(403, 'Unauthorized action.');
        }

        $users = User::where('role', UserRole::User)->get();
        $rooms = Room::all();
        return view('catatans.edit', compact('catatan', 'users', 'rooms'));
    }

    public function update(Request $request, Catatan $catatan)
    {
        if (Auth::user()->role !== UserRole::Teacher) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'room_id' => 'required|exists:rooms,id',
            'kasus' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'catatan_guru' => 'required|string',
            'poin' => 'required|integer|in:10,20,30,40,50,60,70,80,90,100',
        ]);

        $catatan->update($request->all());

        return redirect()->route('catatans.index')->with('success', 'Catatan berhasil diperbarui.');
    }

    public function destroy(Catatan $catatan)
    {
        if (Auth::user()->role !== UserRole::Teacher) {
            abort(403, 'Unauthorized action.');
        }

        $catatan->delete();

        return redirect()->route('catatans.index')->with('success', 'Catatan berhasil dihapus.');
    }
}
