<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('catatans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users (siswa)
            $table->foreignId('room_id')->constrained('rooms')->onDelete('cascade'); // Relasi ke tabel rooms
            $table->foreignId('guru_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users (guru)
            $table->string('kasus');
            $table->date('tanggal');
            $table->text('catatan_guru');
            $table->enum('poin',[10,20,30,40,50,60,70,80,90,100]);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('catatans');
    }
};
