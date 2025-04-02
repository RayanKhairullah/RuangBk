<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $table = 'biodatas';

    protected $fillable = [
        'user_id', 'nisn', 'jenis_kelamin', 'jurusan_id', 'rooms_id', 'telepon',
        'agama', 'alamat', 'tanggal_lahir', 'gol_darah', 'status', 'image',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class);
    }

    public function rooms()
    {
        return $this->belongsTo(Room::class);
    }
}