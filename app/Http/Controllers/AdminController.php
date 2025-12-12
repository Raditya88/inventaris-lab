<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inventaris;
use App\Models\Peminjaman;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalAlat = Inventaris::count();
        $totalPeminjaman = Peminjaman::count();
        $menunggu = Peminjaman::where('status','menunggu')->count();
        $disetujui = Peminjaman::where('status','disetujui')->count();

        return view('dashboard', compact(
            'totalAlat', 'totalPeminjaman', 'menunggu', 'disetujui'
        ));
    }
}
