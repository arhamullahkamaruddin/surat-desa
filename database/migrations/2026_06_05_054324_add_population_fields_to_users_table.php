<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('nik', 16)->nullable()->unique()->after('email');
            $table->string('no_kk', 16)->nullable()->after('nik');

            $table->string('tempat_lahir')->nullable()->after('no_kk');
            $table->date('tanggal_lahir')->nullable()->after('tempat_lahir');

            $table->enum('jenis_kelamin', [
                'Laki-laki',
                'Perempuan'
            ])->nullable()->after('tanggal_lahir');

            $table->string('agama')->nullable()->after('jenis_kelamin');

            $table->string('pekerjaan')->nullable()->after('agama');

            $table->text('alamat')->nullable()->after('pekerjaan');

            $table->string('rt', 3)->nullable()->after('alamat');
            $table->string('rw', 3)->nullable()->after('rt');

            $table->string('nomor_wa', 20)->nullable()->after('rw');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {

            $table->dropColumn([
                'nik',
                'no_kk',
                'tempat_lahir',
                'tanggal_lahir',
                'jenis_kelamin',
                'agama',
                'pekerjaan',
                'alamat',
                'rt',
                'rw',
                'nomor_wa',
            ]);
        });
    }
};
