<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use Illuminate\Support\Facades\Storage; // WAJIB DITAMBAHKAN untuk mengelola file foto

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Saya ubah menjadi $anggota (pakai 's') agar sesuai dengan file view index.blade.php yang kita buat sebelumnya
        $anggota = Anggota::latest()->get(); 
        
        return view('admin.anggota.index', compact('anggota'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // KITA CEK APAKAH DATANYA LOLOS VALIDASI ATAU TIDAK
        $validated = $request->validate([
            'nia'          => 'nullable|string|max:255|unique:anggota,nia',
            'nama'         => 'required|string|max:255',
            'angkatan'     => 'required|string|max:255',
            'jabatan'      => 'required|string|max:255',
            'no_hp'        => 'nullable|string|max:20',
            'status'       => 'required|string',
            'tipe_anggota' => 'required|string',
            'foto'         => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);
        // ------------------------------------

        if ($request->hasFile('foto')) {
            $validated['foto'] = $request->file('foto')->store('foto-anggota', 'public');
        }

        Anggota::create($validated);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $anggota = Anggota::findOrFail($id);
        
        return view('admin.anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::findOrFail($id);

        // 1. Validasi input
        $validated = $request->validate([
            'nia'      => 'nullable|string|max:255|unique:anggota,nia,' . $anggota->id, // Pengecualian unik untuk diri sendiri
            'nama'     => 'required|string|max:255',
            'angkatan' => 'required|string|max:255',
            'jabatan'  => 'required|string|max:255',
            'no_hp'    => 'nullable|string|max:20',
            'status'   => 'required|string',
            'tipe_anggota' => 'required|string',
            'foto'     => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // 2. Cek jika ada foto baru yang diunggah
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($anggota->foto) {
                Storage::disk('public')->delete($anggota->foto);
            }
            // Simpan foto baru
            $validated['foto'] = $request->file('foto')->store('foto-anggota', 'public');
        }

        // 3. Update data di database
        $anggota->update($validated);

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $anggota = Anggota::findOrFail($id); // Memperbaiki penulisan anggota dengan huruf kapital 'A'

        // Hapus file foto dari storage sebelum datanya dihapus
        if ($anggota->foto) {
            Storage::disk('public')->delete($anggota->foto);
        }

        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Data anggota berhasil dihapus!');
    }
}