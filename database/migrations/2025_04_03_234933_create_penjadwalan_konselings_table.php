<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('penjadwalan_konselings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pengirim_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->foreignId('penerima_id')->constrained('users')->onDelete('cascade'); // Relasi ke tabel users
            $table->string('lokasi');
            $table->dateTime('tanggal');
            $table->text('topik_dibahas');
            $table->text('solusi')->nullable(); // Diisi oleh guru setelah jadwal selesai
            $table->enum('status', ['Complete', 'Incomplete'])->default('Incomplete'); // Status jadwal
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penjadwalan_konselings');
    }
};