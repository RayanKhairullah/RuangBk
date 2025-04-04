<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Catatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'room_id',
        'guru_id',
        'kasus',
        'tanggal',
        'catatan_guru',
        'poin',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function guru()
    {
        return $this->belongsTo(User::class, 'guru_id');
    }
}