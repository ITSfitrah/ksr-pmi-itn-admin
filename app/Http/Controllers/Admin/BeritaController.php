<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    // Fungsi untuk menampilkan halaman form tambah berita
    public function create()
    {
        return view('admin.berita.create'); 
    }

    // Fungsi untuk menampilkan halaman utama berita
   // Fungsi untuk menampilkan halaman utama berita
    public function index()
    {
        // Mengambil semua data dari tabel berita, diurutkan dari yang terbaru
        $berita = Berita::latest()->get(); 
        
        // Melempar variabel $berita ke file tampilan (view)
        return view('admin.berita.index', compact('berita'));
    }

    // Menampilkan form edit berita yang sudah ada isinya
    public function edit($id)
    {
        $berita = Berita::findOrFail($id); // Mencari berita berdasarkan ID
        return view('admin.berita.edit', compact('berita'));
    }

    // Fungsi untuk menyimpan perubahan (nanti kita lengkapi logikanya)
    public function update(Request $request, $id)
    {
        // Logika simpan update akan diletakkan di sini
    }

    // Fungsi untuk menyimpan data berita ke database
    public function store(Request $request)
    {
        // 1. Validasi input dari form
        $request->validate([
            'headline' => 'required|max:255',
            'isi_berita' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Maksimal 2MB, hanya gambar
        ]);

        // 2. Logika upload foto (jika user mengupload foto)
        $namaFoto = null;
        if ($request->hasFile('foto')) {
            $foto = $request->file('foto');
            // Membuat nama unik agar foto tidak saling menimpa
            $namaFoto = time() . '_' . $foto->getClientOriginalName(); 
            // Menyimpan foto ke folder storage/app/public/berita
            $foto->storeAs('public/berita', $namaFoto); 
        }

        // 3. Simpan data ke tabel database
        Berita::create([
            'headline' => $request->headline,
            'isi_berita' => $request->isi_berita,
            'foto' => $namaFoto,
        ]);

        // 4. Kembalikan ke halaman daftar berita dengan pesan sukses
        return redirect()->route('berita.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    
}