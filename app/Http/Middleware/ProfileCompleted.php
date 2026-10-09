<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\VillageProfile;

class ProfileCompleted
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();

        if ($user && $user->role === 'user') {

            $village = VillageProfile::first();

            $requiredFields = [
                'nik',
                'no_kk',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'agama',
                'pekerjaan',
                'alamat',
                'nomor_wa',
            ];

            if ($village && $village->uses_rt_rw) {
                $requiredFields[] = 'rt';
                $requiredFields[] = 'rw';
            }

            foreach ($requiredFields as $field) {
                if (blank($user->{$field})) {
                    return redirect()
                        ->route('profile.edit')
                        ->with(
                            'error',
                            'Lengkapi data profil terlebih dahulu sebelum mengajukan surat.'
                        );
                }
            }
        }

        return $next($request);
    }
}
