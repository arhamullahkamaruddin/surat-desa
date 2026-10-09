<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;

class DashboardController extends Controller
{
    public function index()
    {
        $totalPengajuan = PengajuanSurat::count();

        $totalMenunggu = PengajuanSurat::where(
            'status',
            'menunggu'
        )->count();

        $totalDiproses = PengajuanSurat::where(
            'status',
            'diproses'
        )->count();

        $totalSelesai = PengajuanSurat::where(
            'status',
            'selesai'
        )->count();

        $totalDitolak = PengajuanSurat::where(
            'status',
            'ditolak'
        )->count();

        $pengajuanTerbaru = PengajuanSurat::with([
            'user',
            'jenisSurat',
        ])
            ->latest()
            ->take(10)
            ->get();

        return view(
            'admin.dashboard',
            compact(
                'totalPengajuan',
                'totalMenunggu',
                'totalDiproses',
                'totalSelesai',
                'totalDitolak',
                'pengajuanTerbaru'
            )
        );
    }
}
