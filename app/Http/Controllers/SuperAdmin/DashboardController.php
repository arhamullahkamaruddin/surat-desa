<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;

class DashboardController extends Controller
{
    public function index()
    {
        $totalUser = User::where(
            'role',
            'user'
        )->count();

        $totalAdmin = User::where(
            'role',
            'admin'
        )->count();

        $totalJenisSurat = JenisSurat::count();

        $totalPengajuan = PengajuanSurat::count();

        $pengajuanTerbaru = PengajuanSurat::with([
            'user',
            'jenisSurat',
        ])
            ->latest()
            ->take(10)
            ->get();

        return view(
            'superadmin.dashboard',
            compact(
                'totalUser',
                'totalAdmin',
                'totalJenisSurat',
                'totalPengajuan',
                'pengajuanTerbaru'
            )
        );
    }
}
