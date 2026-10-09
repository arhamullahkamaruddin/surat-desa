<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pengajuan_surats', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('jenis_surat_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->string('nomor_pengajuan')
                ->unique();

            $table->enum('status', [
                'menunggu',
                'diproses',
                'selesai',
                'ditolak',
            ])->default('menunggu');

            $table->text('catatan_admin')
                ->nullable();

            $table->timestamp('tanggal_selesai')
                ->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pengajuan_surats');
    }
};
