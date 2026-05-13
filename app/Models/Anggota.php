<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;
    protected $table = 'anggota';
    protected $fillable = [
        'nia',
        'nama',
        'angkatan',
        'jabatan',
        'no_hp',
        'status',
        'tipe_anggota', // DITAMBAHKAN
        'foto',
    ];
}
