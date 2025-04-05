<?php
namespace App\Http\Controllers;

use App\Enums\UserRole; 
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
        // Asumsikan Anda menggunakan enum (App\Enums\UserRole)
        if (Auth::user()->role === UserRole::Teacher) {
            // Guru membuat jadwal, tampilkan dropdown dengan data siswa saja
            $users = User::where('role', UserRole::User)->get();
        } else {
            // User membuat jadwal, tampilkan dropdown dengan data guru saja
            $users = User::where('role', UserRole::Teacher)->get();
        }
        return view('penjadwalan.create', compact('users'));
        
        // return view('penjadwalan.create');
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
        // Pastikan hanya pengirim atau penerima yang dapat mengubah data
        if (Auth::id() !== $penjadwalan->pengirim_id && Auth::id() !== $penjadwalan->penerima_id) {
            abort(403, 'Unauthorized action.');
        }

        // Validasi data umum
        $data = $request->validate([
            'lokasi' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'topik_dibahas' => 'required|string',
        ]);

        // Hanya guru yang bisa mengupdate solusi dan status
        if (Auth::user()->role === UserRole::Teacher) {
            $dataTeacher = $request->validate([
                'solusi' => 'nullable|string',
                'status' => 'nullable|in:Complete,Incomplete',
            ]);
            $data = array_merge($data, $dataTeacher);
        }

        $penjadwalan->update($data);

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

    // public function search(Request $request)
    // {
    //     $role = Auth::user()->role === UserRole::Teacher->value 
    //         ? UserRole::User->value 
    //         : UserRole::Teacher->value;
    
    //     $search = $request->get('q');
    
    //     $users = User::where('role', $role)
    //     ->when($search, function ($query, $search) {
    //         $query->where(function ($q) use ($search) {
    //             $q->where('name', 'like', '%' . $search . '%')
    //                 ->orWhere('email', 'like', '%' . $search . '%');
    //         });
    //     })
    //     ->limit(10)
    //     ->get();
    
    //     return response()->json($users);
    // }

    public function destroy(PenjadwalanKonseling $penjadwalan)
    {
        if (Auth::id() !== $penjadwalan->pengirim_id && Auth::id() !== $penjadwalan->penerima_id) {
            abort(403, 'Unauthorized action.');
        }

        $penjadwalan->delete();

        return redirect()->route('penjadwalan.index')->with('success', 'Jadwal konseling berhasil dihapus.');
    }
}