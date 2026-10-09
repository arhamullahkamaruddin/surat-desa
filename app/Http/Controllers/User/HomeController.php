<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        $jenisSurats = JenisSurat::where(
            'is_active',
            true
        )->get();

        $pengajuans = collect();

        if (Auth::check()) {

            $pengajuans = PengajuanSurat::with(
                'jenisSurat'
            )
                ->where(
                    'user_id',
                    Auth::id()
                )
                ->latest()
                ->get();
        }

        return view(
            'user.home',
            compact(
                'jenisSurats',
                'pengajuans'
            )
        );
    }
}
