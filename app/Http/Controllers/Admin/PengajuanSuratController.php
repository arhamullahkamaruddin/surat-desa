<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PengajuanSurat;
use App\Models\PengajuanSuratDetail;
use App\Models\VillageProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;

class PengajuanSuratController extends Controller
{
    public function index()
    {
        $pengajuans = PengajuanSurat::with([
            'user',
            'jenisSurat',
        ])
            ->latest()
            ->paginate(15);

        return view(
            'admin.pengajuan.index',
            compact('pengajuans')
        );
    }

    public function show(
        PengajuanSurat $pengajuanSurat
    ) {
        $pengajuanSurat->load([
            'user',
            'jenisSurat',
            'details.field',
            'editor',
        ]);

        return view(
            'admin.pengajuan.show',
            compact('pengajuanSurat')
        );
    }

    public function updateStatus(
        Request $request,
        PengajuanSurat $pengajuanSurat
    ) {
        $validated = $request->validate([
            'status' => [
                'required',
                'in:menunggu,diproses,selesai,ditolak',
            ],
            'catatan_admin' => ['nullable'],
        ]);

        $pengajuanSurat->status =
            $validated['status'];

        $pengajuanSurat->catatan_admin =
            $validated['catatan_admin'] ?? null;

        if (
            $validated['status'] === 'selesai'
            && !$pengajuanSurat->nomor_surat
        ) {

            $pengajuanSurat->nomor_surat =
                $this->generateNomorSurat();

            $pengajuanSurat->tanggal_selesai =
                now();
        }

        $pengajuanSurat->save();

        return back()->with(
            'success',
            'Status berhasil diperbarui.'
        );
    }

    public function updateDetail(
        Request $request,
        PengajuanSurat $pengajuanSurat
    ) {
        foreach (
            $request->input('fields', [])
            as $detailId => $value
        ) {

            $detail = $pengajuanSurat
                ->details()
                ->where('id', $detailId)
                ->first();

            if ($detail) {

                $detail->update([
                    'value' => $value,
                ]);
            }
        }

        $pengajuanSurat->update([
            'last_edited_by' => Auth::id(),
        ]);

        return back()->with(
            'success',
            'Data pengajuan berhasil diperbarui.'
        );
    }

    public function download(
        PengajuanSurat $pengajuanSurat
    ) {
        if (
            $pengajuanSurat->status !== 'selesai'
        ) {
            abort(403);
        }

        $pengajuanSurat->load([
            'user',
            'jenisSurat',
            'details.field',
        ]);

        $village = VillageProfile::firstOrFail();

        $pdf = Pdf::loadView(
            $pengajuanSurat->jenisSurat->template_view,
            [
                'pengajuan' => $pengajuanSurat,
                'user' => $pengajuanSurat->user,
                'village' => $village,
            ]
        );

        $filename = sprintf(
            '%s-%s.pdf',
            $pengajuanSurat->jenisSurat->kode_surat,
            $pengajuanSurat->id
        );

        return $pdf->download(
            $filename
        );
    }

    public function preview(
        PengajuanSurat $pengajuanSurat
    ) {
        if (
            $pengajuanSurat->status !== 'selesai'
        ) {
            abort(403);
        }

        $pengajuanSurat->load([
            'user',
            'jenisSurat',
            'details.field',
        ]);

        $village = VillageProfile::firstOrFail();

        $pdf = Pdf::loadView(
            $pengajuanSurat->jenisSurat->template_view,
            [
                'pengajuan' => $pengajuanSurat,
                'user' => $pengajuanSurat->user,
                'village' => $village,
            ]
        );

        $filename = sprintf(
            '%s-%s.pdf',
            $pengajuanSurat->jenisSurat->kode_surat,
            $pengajuanSurat->id
        );

        return $pdf->stream(
            $filename
        );
    }

    private function generateNomorSurat(): string
    {
        $village = VillageProfile::first();

        $nextNumber = PengajuanSurat::whereNotNull('nomor_surat')
            ->count() + 1;

        $nomorUrut = str_pad(
            $nextNumber,
            3,
            '0',
            STR_PAD_LEFT
        );

        $bulanRomawi = [
            1 => 'I',
            2 => 'II',
            3 => 'III',
            4 => 'IV',
            5 => 'V',
            6 => 'VI',
            7 => 'VII',
            8 => 'VIII',
            9 => 'IX',
            10 => 'X',
            11 => 'XI',
            12 => 'XII',
        ];

        $kodeDesa = strtoupper(
            str_replace(
                ' ',
                '-',
                $village->nama_desa
            )
        );

        return sprintf(
            '470/%s/DS-%s/%s/%s',
            $nomorUrut,
            $kodeDesa,
            $bulanRomawi[now()->month],
            now()->year
        );
    }

    public function byStatus(string $status)
    {
        abort_unless(
            in_array(
                $status,
                [
                    'menunggu',
                    'diproses',
                    'selesai',
                    'ditolak',
                ]
            ),
            404
        );

        $pengajuans = PengajuanSurat::with([
            'user',
            'jenisSurat',
        ])
            ->where(
                'status',
                $status
            )
            ->latest()
            ->paginate(15);

        return view(
            'admin.pengajuan.index',
            compact(
                'pengajuans',
                'status'
            )
        );
    }
}
