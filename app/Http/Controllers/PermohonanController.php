<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Permohonan;
use App\Models\Barang; // Wajib ditambahkan untuk mengambil data barang
use Illuminate\Http\Request;

class PermohonanController extends Controller
{
    // =================================================================
    // AREA PUBLIK (Diakses oleh pelanggan dari website luar)
    // =================================================================

    // 1. Menampilkan Halaman Form Pengajuan (Publik)
    public function create()
    {
      $barang = Barang::all();

        // Panggil file view dan kirimkan variabel $barang
        return view('public.permohonan.create', compact('barang'));
    }

    // 2. Memproses Data dari Form Pengajuan (Publik)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_pemohon'            => 'required|string|max:255',
            'no_telp'                 => 'required|string|max:20',
            'alamat_detail'           => 'required|string',
            'instansi'                => 'nullable|string|max:255',
            'durasi_peminjaman'       => 'required|integer|min:1',
            'tgl_rencana_pengambilan' => 'required|date',
        ]);

        // Simpan data ke database
        Permohonan::create($validated);

        // DIUBAH KE SINI: Mengalihkan pengguna ke URL /publik setelah sukses
        return redirect('/publik')->with('success', 'Pengajuan berhasil dikirim! Silakan tunggu konfirmasi lebih lanjut.');
    }


    // =================================================================
    // AREA ADMIN (Diakses oleh admin di dalam dashboard)
    // =================================================================

    // 3. Menampilkan Tabel Daftar Pengajuan (Admin)
    public function index()
    {
       $permohonan = Permohonan::latest()->get();
        // INI BIANG KEROKNYA 👇
        return view('public.permohonan.create', compact('permohonan'));
    }

    // 4. Menampilkan Form Edit Status/Data (Admin)
    public function edit($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        return view('admin.permohonan.edit', compact('permohonan'));
    }

    // 5. Menyimpan Perubahan Edit (Admin)
    public function update(Request $request, $id)
    {
        $permohonan = Permohonan::findOrFail($id);

        $validated = $request->validate([
            'nama_pemohon'            => 'required|string|max:255',
            'no_telp'                 => 'required|string|max:20',
            'alamat_detail'           => 'required|string',
            'instansi'                => 'nullable|string|max:255',
            'durasi_peminjaman'       => 'required|integer|min:1',
            'tgl_rencana_pengambilan' => 'required|date',
            'status'                  => 'required|string', // Status diubah oleh admin
        ]);

        $permohonan->update($validated);

        return redirect()->route('permohonan.index')->with('success', 'Data permohonan berhasil diperbarui!');
    }

    // 6. Menghapus Data Pengajuan (Admin)
    public function destroy($id)
    {
        $permohonan = Permohonan::findOrFail($id);
        $permohonan->delete();

        return redirect()->route('permohonan.index')->with('success', 'Data permohonan berhasil dihapus!');
    }
}