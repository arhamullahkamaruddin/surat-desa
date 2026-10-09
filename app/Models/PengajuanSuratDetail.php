<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSuratDetail extends Model
{
    protected $fillable = [
        'pengajuan_surat_id',
        'surat_field_id',
        'value',
    ];

    public function pengajuanSurat()
    {
        return $this->belongsTo(PengajuanSurat::class);
    }

    public function field()
    {
        return $this->belongsTo(
            SuratField::class,
            'surat_field_id'
        );
    }
}
