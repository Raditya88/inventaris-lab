<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use Illuminate\Http\Request;

class InventarisController extends Controller
{
    // Tampilkan semua data
    public function index()
    {
        $data = Inventaris::all();
        return view('inventaris.index', compact('data'));
    }

    // Form tambah
    public function create()
    {
        return view('inventaris.create');
    }

    // Simpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_alat' => 'required',
            'kode' => 'required|unique:inventaris',
            'jumlah' => 'required|numeric',
        ]);

        Inventaris::create($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil ditambahkan!');
    }

    // Form edit
    public function edit($id)
    {
        $item = Inventaris::findOrFail($id);
        return view('inventaris.edit', compact('item'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_alat' => 'required',
            'jumlah' => 'required|numeric',
        ]);

        $item = Inventaris::findOrFail($id);
        $item->update($request->all());

        return redirect()->route('inventaris.index')->with('success', 'Data berhasil diupdate!');
    }

    // Hapus data
    public function destroy($id)
    {
        Inventaris::destroy($id);
        return redirect()->route('inventaris.index')->with('success', 'Data berhasil dihapus!');
    }
}
