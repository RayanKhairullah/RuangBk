<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('biodatas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('nisn')->unique();
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->foreignId('jurusan_id')->constrained('jurusans')->onDelete('cascade');
            $table->foreignId('rooms_id')->constrained('rooms')->onDelete('cascade'); // Mengganti 'kelas' menjadi 'rooms'
            $table->string('telepon');
            $table->enum('agama', ['Islam', 'Kristen', 'Hindu', 'Budha', 'Lainnya']);
            $table->text('alamat');
            $table->date('tanggal_lahir');
            $table->enum('gol_darah', ['A', 'B', 'AB', 'O']);
            $table->string('status');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodatas');
    }
};
