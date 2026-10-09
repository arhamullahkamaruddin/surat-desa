<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratField extends Model
{
    protected $fillable = [
        'jenis_surat_id',
        'label',
        'name',
        'type',
        'placeholder',
        'is_required',
        'options',
        'sort_order',
    ];

    protected $casts = [
        'is_required' => 'boolean',
    ];

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }
}
