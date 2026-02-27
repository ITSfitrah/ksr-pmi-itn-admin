<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    use HasFactory;

    // Menentukan nama tabel secara spesifik
    protected $table = 'berita';

    // Mengizinkan semua kolom diisi kecuali ID
    protected $guarded = ['id'];
}