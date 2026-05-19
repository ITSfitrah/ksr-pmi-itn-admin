<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class permohonan extends Model
{
    use HasFactory;
    protected $table = 'permohonan';

    // WAJIB DITAMBAHKAN: Memberi tahu Laravel nama Primary Key yang baru
    protected $primaryKey = 'id_permohonan';

    protected $fillable = [
        'nama_pemohon',
        'no_telp',
        'alamat_detail',
        'instansi',
        'durasi_peminjaman',
        'tgl_rencana_pengambilan',
        'status',
    ];
}
