<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class proker extends Model
{
    use HasFactory;
    protected $table = 'proker';

    // Beri tahu Laravel bahwa primary key-nya bukan 'id', melainkan 'id_program'
    protected $primaryKey = 'id_program';

    // Daftarkan kolom yang boleh diisi
    protected $fillable = [
        'nama_program',
        'deskripsi',
        'tanggal_mulai',
        'tanggal_selesai',
        'status',
    ];
}
