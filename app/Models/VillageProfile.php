<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VillageProfile extends Model
{
    protected $fillable = [
        'nama_desa',
        'alamat_desa',
        'kecamatan',
        'kabupaten',
        'provinsi',
        'kode_pos',
        'nomor_wa',
        'kepala_desa',
        'nip_kepala_desa',
        'sekretaris_desa',
        'nip_sekretaris_desa',
        'uses_rt_rw',
    ];
}
