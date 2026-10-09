<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    protected $fillable = [
        'nama_surat',
        'kode_surat',
        'slug',
        'deskripsi',
        'template_view',
        'is_active',
    ];

    public function fields()
    {
        return $this->hasMany(SuratField::class)
        ->orderBy('sort_order')
        ->orderBy('id');
    }
}
