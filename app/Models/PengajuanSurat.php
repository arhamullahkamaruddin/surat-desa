<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    protected $fillable = [
        'user_id',
        'jenis_surat_id',
        'nomor_pengajuan',
        'nomor_surat',
        'status',
        'catatan_admin',
        'last_edited_by',
        'tanggal_selesai',
    ];

    protected $casts = [
        'tanggal_selesai' => 'datetime',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function jenisSurat()
    {
        return $this->belongsTo(JenisSurat::class);
    }

    public function details()
    {
        return $this->hasMany(PengajuanSuratDetail::class);
    }

    public function editor()
    {
        return $this->belongsTo(User::class, 'last_edited_by');
    }

    public function getField(string $name): ?string
    {
        $detail = $this->details
            ->first(fn($detail) => $detail->field?->name === $name);

        return $detail?->value;
    }
}
