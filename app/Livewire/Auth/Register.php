<?php

namespace App\Livewire\Auth;

use App\Models\User;
use App\Models\Room;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.auth')]
class Register extends Component
{
    public string $name = '';

    public string $email = '';

    public string $password = '';

    public string $password_confirmation = '';

    public string $kode_rooms = '';

    public array $rooms = [];

    /**
     * Load daftar rooms saat komponen di-mount.
     */
    public function mount(): void
    {
        $this->rooms = Room::with('jurusan')->get()->toArray(); // Ambil semua rooms beserta jurusan
    }

    /**
     * Handle an incoming registration request.
     */
    public function register(): void
    {
        $validated = $this->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'string', 'confirmed', Rules\Password::defaults()],
            'kode_rooms' => ['required', 'exists:rooms,kode_rooms'],
        ]);

        $validated['password'] = Hash::make($validated['password']);
        $validated['kode_rooms'] = $this->kode_rooms;

        event(new Registered(($user = User::create($validated))));

        Auth::login($user);

        $this->redirect(route('dashboard', absolute: false), navigate: true);
    }
}