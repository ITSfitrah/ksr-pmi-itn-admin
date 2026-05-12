<?php

namespace App\Http\Controllers;

use App\Models\Proker;
use Illuminate\Http\Request;

class ProkerController extends Controller
{
    public function index()
    {
        $prokers = Proker::latest('tanggal_mulai')->get(); // Diurutkan berdasarkan tanggal mulai
        return view('admin.proker.index', compact('prokers'));
    }

    public function create()
    {
        return view('admin.proker.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_program'    => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'          => 'required|string',
        ]);

        Proker::create($validated);
        return redirect()->route('proker.index')->with('success', 'Program kerja berhasil ditambahkan!');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $proker = Proker::findOrFail($id);
        return view('admin.proker.edit', compact('proker'));
    }

    public function update(Request $request, $id)
    {
        $proker = Proker::findOrFail($id);

        $validated = $request->validate([
            'nama_program'    => 'required|string|max:255',
            'deskripsi'       => 'nullable|string',
            'tanggal_mulai'   => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'status'          => 'required|string',
        ]);

        $proker->update($validated);
        return redirect()->route('proker.index')->with('success', 'Program kerja berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $proker = Proker::findOrFail($id);
        $proker->delete();

        return redirect()->route('proker.index')->with('success', 'Program kerja berhasil dihapus!');
    }
}