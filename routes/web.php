<?php

use App\Livewire\Settings\Appearance;
use App\Livewire\Settings\Password;
use App\Livewire\Settings\Profile;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BiodataController;
use App\Http\Controllers\PenjadwalanKonselingController;
use App\Http\Controllers\CatatanController;

//Users Routes
Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('biodatas/create', [BiodataController::class, 'create'])->name('biodatas.create');
    Route::post('biodatas', [BiodataController::class, 'store'])->name('biodatas.store');
    Route::get('biodatas/edit', [BiodataController::class, 'edit'])->name('biodatas.edit');
    Route::put('biodatas', [BiodataController::class, 'update'])->name('biodatas.update');
    Route::get('biodatas', [BiodataController::class, 'show'])->name('biodatas.show');
    Route::resource('penjadwalan', PenjadwalanKonselingController::class);
    Route::post('penjadwalan/{penjadwalan}/send', [PenjadwalanKonselingController::class, 'send'])->name('penjadwalan.send');
    Route::resource('catatans', CatatanController::class);
});

//Teachers Routes
Route::view('teacher/dashboard', 'teacher.dashboard')
    ->middleware(['auth', 'verified', 'teacher'])
    ->name('teacher.dashboard');

Route::middleware(['auth', 'verified', 'teacher'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('jurusans', JurusanController::class);
    Route::resource('rooms', RoomController::class);
    Route::get('rooms/{room}', [RoomController::class, 'show'])->name('rooms.show');
});

//Settings Routes
Route::middleware(['auth'])->group(function () {
    Route::redirect('settings', 'settings/profile');

    Route::get('settings/profile', Profile::class)->name('settings.profile');
    Route::get('settings/password', Password::class)->name('settings.password');
    Route::get('settings/appearance', Appearance::class)->name('settings.appearance');
});

require __DIR__.'/auth.php';
