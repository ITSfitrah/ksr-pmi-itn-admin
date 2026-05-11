<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang; // Wajib ditambahkan

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::latest()->get();
        return view('admin.inventaris.barang.index', compact('barang'));
    }

    // Menampilkan form tambah barang
    public function create()
    {
        return view('admin.inventaris.barang.create');
    }

    // Menyimpan data barang baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil ditambahkan!');
    }

    // Menampilkan form edit barang
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.inventaris.barang.edit', compact('barang'));
    }

    // Menyimpan perubahan data barang
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1',
            'kondisi' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->update($request->all());

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil diperbarui!');
    }

    // Menghapus data barang
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Data barang berhasil dihapus!');
    }
}