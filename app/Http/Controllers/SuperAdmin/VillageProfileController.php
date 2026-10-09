<?php

namespace App\Http\Controllers\SuperAdmin;

use App\Http\Controllers\Controller;
use App\Models\VillageProfile;
use Illuminate\Http\Request;

class VillageProfileController extends Controller
{
    public function edit()
    {
        $village = VillageProfile::firstOrCreate(
            ['id' => 1],
            [
                'nama_desa' => '',
                'alamat_desa' => '',
                'kecamatan' => '',
                'kabupaten' => '',
                'provinsi' => '',
                'kode_pos' => null,
                'kepala_desa' => '',
                'nip_kepala_desa' => null,
                'sekretaris_desa' => null,
                'nip_sekretaris_desa' => null,
                'uses_rt_rw' => true,
            ]
        );

        return view('superadmin.village-profile.edit', compact('village'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'nama_desa' => ['required', 'string', 'max:255'],
            'alamat_desa' => ['required', 'string'],
            'kecamatan' => ['required', 'string', 'max:255'],
            'kabupaten' => ['required', 'string', 'max:255'],
            'provinsi' => ['required', 'string', 'max:255'],
            'kode_pos' => ['nullable', 'string', 'max:20'],
            'nomor_wa' => ['nullable', 'string', 'max:20',],
            'kepala_desa' => ['required', 'string', 'max:255'],
            'nip_kepala_desa' => ['nullable', 'string', 'max:50'],
            'sekretaris_desa' => ['nullable', 'string', 'max:255'],
            'nip_sekretaris_desa' => ['nullable', 'string', 'max:50'],
            'uses_rt_rw' => ['nullable', 'boolean'],
        ]);

        $validated['uses_rt_rw'] = $request->boolean('uses_rt_rw');

        if (!empty($validated['nomor_wa'])) {

            $nomor = preg_replace(
                '/[^0-9]/',
                '',
                $validated['nomor_wa']
            );

            if (str_starts_with($nomor, '0')) {

                $nomor = '62' . substr($nomor, 1);
            }

            $validated['nomor_wa'] = $nomor;
        }

        $village = VillageProfile::firstOrCreate(['id' => 1]);
        $village->update($validated);

        return back()->with('success', 'Data desa berhasil diperbarui.');
    }
}
