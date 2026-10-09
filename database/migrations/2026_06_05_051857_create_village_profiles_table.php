<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('village_profiles', function (Blueprint $table) {
            $table->id();

            $table->string('nama_desa');
            $table->text('alamat_desa');

            $table->string('kecamatan');
            $table->string('kabupaten');
            $table->string('provinsi');

            $table->string('kode_pos')->nullable();

            $table->string('kepala_desa');
            $table->string('nip_kepala_desa')->nullable();

            $table->string('sekretaris_desa')->nullable();
            $table->string('nip_sekretaris_desa')->nullable();

            $table->boolean('uses_rt_rw')->default(true);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('village_profiles');
    }
};
