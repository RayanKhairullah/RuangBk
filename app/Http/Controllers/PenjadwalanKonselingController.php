<?php
namespace App\Http\Controllers;

use App\Models\PenjadwalanKonseling;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\KonselingNotification;
use Illuminate\Support\Facades\Mail;

class PenjadwalanKonselingController extends Controller
{
    public function index()
    {
        $jadwals = PenjadwalanKonseling::with(['pengirim', 'penerima'])
            ->where('pengirim_id', Auth::id())
            ->orWhere('penerima_id', Auth::id())
            ->get();

        return view('penjadwalan.index', compact('jadwals'));
    }

    public function create()
    {
        $users = User::all();
        return view('penjadwalan.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima_id' => 'required|exists:users,id',
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'topik_dibahas' => 'required|string',
        ]);

        PenjadwalanKonseling::create([
            'pengirim_id' => Auth::id(),
            'penerima_id' => $request->penerima_id,
            'lokasi' => $request->lokasi,
            'tanggal' => $request->tanggal,
            'topik_dibahas' => $request->topik_dibahas,
        ]);

        return redirect()->route('penjadwalan.index')->with('success', 'Jadwal konseling berhasil dibuat.');
    }

    public function edit(PenjadwalanKonseling $penjadwalan)
    {
        if (Auth::id() !== $penjadwalan->pengirim_id && Auth::id() !== $penjadwalan->penerima_id) {
            abort(403, 'Unauthorized action.');
        }

        return view('penjadwalan.edit', compact('penjadwalan'));
    }

    public function update(Request $request, PenjadwalanKonseling $penjadwalan)
    {
        if (Auth::id() !== $penjadwalan->pengirim_id && Auth::id() !== $penjadwalan->penerima_id) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'topik_dibahas' => 'required|string',
            'solusi' => 'nullable|string',
            'status' => 'nullable|in:Complete,Incomplete',
        ]);

        $penjadwalan->update($request->all());

        return redirect()->route('penjadwalan.index')->with('success', 'Jadwal konseling berhasil diperbarui.');
    }

    public function send(PenjadwalanKonseling $penjadwalan)
    {
        // Pastikan hanya pengirim atau penerima yang dapat mengirim email
        if (Auth::id() !== $penjadwalan->pengirim_id && Auth::id() !== $penjadwalan->penerima_id) {
            abort(403, 'Unauthorized action.');
        }
    
        // Kirim email ke penerima
        Mail::to($penjadwalan->penerima->email)->send(new KonselingNotification($penjadwalan));
    
        return redirect()->route('penjadwalan.index')->with('success', 'Jadwal berhasil dikirim ke email penerima.');
    }

    public function destroy(PenjadwalanKonseling $penjadwalan)
    {
        if (Auth::id() !== $penjadwalan->pengirim_id && Auth::id() !== $penjadwalan->penerima_id) {
            abort(403, 'Unauthorized action.');
        }

        $penjadwalan->delete();

        return redirect()->route('penjadwalan.index')->with('success', 'Jadwal konseling berhasil dihapus.');
    }
}