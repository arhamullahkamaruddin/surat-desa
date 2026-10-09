<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\JenisSurat;
use App\Models\PengajuanSurat;
use App\Models\PengajuanSuratDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PengajuanSuratController extends Controller
{
    public function create(JenisSurat $jenisSurat)
    {
        $jenisSurat->load('fields');

        return view(
            'user.pengajuan.create',
            compact('jenisSurat')
        );
    }

    private function generateNomorPengajuan(): string
    {
        $year = now()->year;

        $number = (PengajuanSurat::max('id') ?? 0) + 1;

        return sprintf(
            'PS-%s-%05d',
            $year,
            $number
        );
    }

    public function store(
        Request $request,
        JenisSurat $jenisSurat
    ) {
        $jenisSurat->load('fields');

        $rules = [];

        foreach ($jenisSurat->fields as $field) {

            $rule = $field->is_required
                ? ['required']
                : ['nullable'];

            switch ($field->type) {

                case 'number':
                    $rule[] = 'numeric';
                    break;

                case 'date':
                    $rule[] = 'date';
                    break;

                default:
                    $rule[] = 'string';
                    break;
            }

            $rules["fields.{$field->id}"] = $rule;
        }

        $validated = $request->validate($rules);

        DB::transaction(function () use (
            $validated,
            $jenisSurat
        ) {

            $pengajuan = PengajuanSurat::create([
                'user_id' => Auth::id(),
                'jenis_surat_id' => $jenisSurat->id,
                'nomor_pengajuan' => $this->generateNomorPengajuan(),
                'status' => 'menunggu',
            ]);

            foreach ($jenisSurat->fields as $field) {

                $value = $validated['fields'][$field->id] ?? null;

                PengajuanSuratDetail::create([
                    'pengajuan_surat_id' => $pengajuan->id,
                    'surat_field_id' => $field->id,
                    'value' => $value,
                ]);
            }
        });

        return redirect()
            ->route('home')
            ->with(
                'success',
                'Pengajuan surat berhasil dikirim.'
            );
    }

    public function show(
        PengajuanSurat $pengajuanSurat
    ) {
        abort_if(
            $pengajuanSurat->user_id !== Auth::id(),
            403
        );

        $pengajuanSurat->load([
            'jenisSurat',
            'details.field',
        ]);

        return view(
            'user.pengajuan.show',
            compact('pengajuanSurat')
        );
    }
}
