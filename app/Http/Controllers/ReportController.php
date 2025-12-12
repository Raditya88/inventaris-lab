<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjaman;
use App\Models\Inventaris;
use Barryvdh\DomPDF\Facade\Pdf;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $inventaris = Inventaris::all();

        // Ambil filter
        $from = $request->from;
        $to = $request->to;
        $inventaris_id = $request->inventaris_id;

        $query = Peminjaman::with('inventaris');

        if ($from) $query->where('tanggal_pinjam', '>=', $from);
        if ($to) $query->where('tanggal_pinjam', '<=', $to);
        if ($inventaris_id) $query->where('inventaris_id', $inventaris_id);

        $data = $query->orderBy('tanggal_pinjam', 'desc')->get();

        return view('reports.index', compact('data','inventaris','from','to','inventaris_id'));
    }

    // Export PDF
    public function exportPdf(Request $request)
    {
        $query = Peminjaman::with('inventaris');

        if ($request->from) $query->where('tanggal_pinjam', '>=', $request->from);
        if ($request->to) $query->where('tanggal_pinjam', '<=', $request->to);
        if ($request->inventaris_id) $query->where('inventaris_id', $request->inventaris_id);

        $data = $query->orderBy('tanggal_pinjam', 'desc')->get();

        $pdf = Pdf::loadView('reports.pdf', [
            'data' => $data,
            'from' => $request->from,
            'to' => $request->to,
        ])->setPaper('A4', 'portrait');

        return $pdf->stream("laporan_peminjaman.pdf");
    }
}
