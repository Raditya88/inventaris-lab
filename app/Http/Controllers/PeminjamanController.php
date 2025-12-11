<?php

namespace App\Http\Controllers;

use App\Models\Peminjaman;
USE App\Models\Inventaris;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    // form peminjaman
    public function create()
    {
        $alat = Inventaris::where('status', 'tersedia')->get();
        return view('peminjaman.create', compact('alat'));
    }

    // Simpan peminjaman baru
    public function store(Request $request)
    {
        $request->validate([
            'nama_peminjam' => 'required',
            'identitas' => 'required',
            'kontak' => 'required',
            'inventaris_id' => 'required',
            'tanggal_pinjam' => 'required|date',
            'tanggal_kembali' => 'required|date|after_or_equal:tanggal_pinjam',
        ]);

        Peminjaman::create([
            'nama_peminjam' => $request->nama_peminjam,
            'identitas' => $request->identitas,
            'kontak' => $request->kontak,
            'inventaris_id' => $request->inventaris_id,
            'tanggal_pinjam' => $request->tanggal_pinjam,
            'tanggal_kembali' => $request->tanggal_kembali,
        ]);

        return redirect()->back()->with('success', 'Peminjaman berhasil diajukan! Menunggu persetujuan admin.');
    }

    // Admin lihat semua peminjaman
    public function index()
    {
        $data = Peminjaman::with('inventaris')->get();
        return view('peminjaman.index', compact('data'));
    }

    // Setujui
    public function approve($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->update(['status' => 'disetujui']);
        return back();
    }

    // Tolak
    public function reject($id)
    {
        $p = Peminjaman::findOrFail($id);
        $p->update(['status' => 'ditolak']);
        return back();
    }
}
