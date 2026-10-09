<?php

namespace Database\Seeders;

use App\Models\JenisSurat;
use App\Models\SuratField;
use Illuminate\Database\Seeder;

class SuratFieldSeeder extends Seeder
{
    public function run(): void
    {
        $this->seedDomisili();
        $this->seedSkck();
        $this->seedSktm();
        $this->seedKelahiran();
        $this->seedNikah();
    }

    private function seedDomisili(): void
    {
        $jenisSurat = JenisSurat::where(
            'kode_surat',
            'DOMISILI'
        )->first();

        if (!$jenisSurat) {
            return;
        }

        // Tidak ada field tambahan
    }

    private function seedSkck(): void
    {
        $jenisSurat = JenisSurat::where(
            'kode_surat',
            'SKCK'
        )->first();

        if (!$jenisSurat) {
            return;
        }

        $fields = [

            [
                'label' => 'Status Perkawinan',
                'name' => 'status_perkawinan',
                'type' => 'select',
                'options' => implode("\n", [
                    'Belum Kawin',
                    'Kawin',
                    'Cerai Hidup',
                    'Cerai Mati',
                ]),
                'sort_order' => 1,
            ],

            [
                'label' => 'Keperluan SKCK',
                'name' => 'keperluan',
                'type' => 'textarea',
                'placeholder' => 'Masukkan keperluan SKCK',
                'sort_order' => 2,
            ],

        ];

        $this->insertFields(
            $jenisSurat->id,
            $fields
        );
    }

    private function seedSktm(): void
    {
        $jenisSurat = JenisSurat::where(
            'kode_surat',
            'SKTM'
        )->first();

        if (!$jenisSurat) {
            return;
        }

        $fields = [

            [
                'label' => 'Nama Anak',
                'name' => 'nama_anak',
                'type' => 'text',
                'sort_order' => 1,
            ],

            [
                'label' => 'Tempat Lahir Anak',
                'name' => 'tempat_lahir_anak',
                'type' => 'text',
                'sort_order' => 2,
            ],

            [
                'label' => 'Tanggal Lahir Anak',
                'name' => 'tanggal_lahir_anak',
                'type' => 'date',
                'sort_order' => 3,
            ],

            [
                'label' => 'Asal Sekolah',
                'name' => 'asal_sekolah',
                'type' => 'text',
                'sort_order' => 4,
            ],

            [
                'label' => 'Kecamatan Sekolah',
                'name' => 'kecamatan_sekolah',
                'type' => 'text',
                'sort_order' => 5,
            ],

            [
                'label' => 'Kabupaten/Kota Sekolah',
                'name' => 'kabupaten_sekolah',
                'type' => 'text',
                'sort_order' => 6,
            ],

            [
                'label' => 'Provinsi Sekolah',
                'name' => 'provinsi_sekolah',
                'type' => 'text',
                'sort_order' => 7,
            ],

            [
                'label' => 'Nama Orang Tua/Wali',
                'name' => 'nama_ortu',
                'type' => 'text',
                'sort_order' => 8,
            ],

            [
                'label' => 'Pekerjaan Orang Tua/Wali',
                'name' => 'pekerjaan_ortu',
                'type' => 'text',
                'sort_order' => 9,
            ],

            [
                'label' => 'Status Tempat Tinggal',
                'name' => 'status_tempat_tinggal',
                'type' => 'select',
                'options' => implode("\n", [
                    'Rumah Sendiri',
                    'Rumah Keluarga',
                    'Rumah Dinas',
                    'Sewa',
                    'Kontrak',
                    'Kos',
                    'Lainnya',
                ]),
                'sort_order' => 10,
            ],

            [
                'label' => 'Tahun Ajaran',
                'name' => 'tahun_ajaran',
                'type' => 'text',
                'sort_order' => 11,
            ],

        ];

        $this->insertFields(
            $jenisSurat->id,
            $fields
        );
    }

    private function seedKelahiran(): void
    {
        $jenisSurat = JenisSurat::where(
            'kode_surat',
            'SKK'
        )->first();

        if (!$jenisSurat) {
            return;
        }

        $fields = [

            // DATA BAYI

            [
                'label' => 'Hari Lahir',
                'name' => 'hari_lahir',
                'type' => 'text',
                'sort_order' => 1,
            ],

            [
                'label' => 'Tanggal Lahir Bayi',
                'name' => 'tanggal_lahir_bayi',
                'type' => 'date',
                'sort_order' => 2,
            ],

            [
                'label' => 'Jenis Kelamin Bayi',
                'name' => 'jenis_kelamin_bayi',
                'type' => 'select',
                'options' => implode("\n", [
                    'Laki-laki',
                    'Perempuan',
                ]),
                'sort_order' => 3,
            ],

            [
                'label' => 'Waktu Lahir',
                'name' => 'waktu_lahir',
                'type' => 'text',
                'sort_order' => 4,
            ],

            [
                'label' => 'Tempat Lahir Bayi',
                'name' => 'tempat_lahir_bayi',
                'type' => 'text',
                'sort_order' => 5,
            ],

            [
                'label' => 'Nama Bayi',
                'name' => 'nama_bayi',
                'type' => 'text',
                'sort_order' => 6,
            ],

            [
                'label' => 'Anak Ke',
                'name' => 'anak_ke',
                'type' => 'number',
                'sort_order' => 7,
            ],

            // DATA IBU

            [
                'label' => 'Nama Ibu',
                'name' => 'nama_ibu',
                'type' => 'text',
                'sort_order' => 8,
            ],

            [
                'label' => 'NIK Ibu',
                'name' => 'nik_ibu',
                'type' => 'text',
                'sort_order' => 9,
            ],

            [
                'label' => 'Umur Ibu',
                'name' => 'umur_ibu',
                'type' => 'number',
                'sort_order' => 10,
            ],

            [
                'label' => 'Pekerjaan Ibu',
                'name' => 'pekerjaan_ibu',
                'type' => 'text',
                'sort_order' => 11,
            ],

            [
                'label' => 'Alamat Ibu',
                'name' => 'alamat_ibu',
                'type' => 'textarea',
                'sort_order' => 12,
            ],

            [
                'label' => 'Desa Ibu',
                'name' => 'desa_ibu',
                'type' => 'text',
                'sort_order' => 13,
            ],

            [
                'label' => 'Kecamatan Ibu',
                'name' => 'kecamatan_ibu',
                'type' => 'text',
                'sort_order' => 14,
            ],

            [
                'label' => 'Kabupaten Ibu',
                'name' => 'kabupaten_ibu',
                'type' => 'text',
                'sort_order' => 15,
            ],

            [
                'label' => 'Tempat Lahir Ibu',
                'name' => 'tempat_lahir_ibu',
                'type' => 'text',
                'sort_order' => 16,
            ],
            [
                'label' => 'Tanggal Lahir Ibu',
                'name' => 'tanggal_lahir_ibu',
                'type' => 'date',
                'sort_order' => 17,
            ],

            // DATA AYAH

            [
                'label' => 'Nama Ayah',
                'name' => 'nama_ayah',
                'type' => 'text',
                'sort_order' => 18,
            ],

            [
                'label' => 'NIK Ayah',
                'name' => 'nik_ayah',
                'type' => 'text',
                'sort_order' => 19,
            ],

            [
                'label' => 'Umur Ayah',
                'name' => 'umur_ayah',
                'type' => 'number',
                'sort_order' => 20,
            ],

            [
                'label' => 'Pekerjaan Ayah',
                'name' => 'pekerjaan_ayah',
                'type' => 'text',
                'sort_order' => 21,
            ],

            [
                'label' => 'Alamat Ayah',
                'name' => 'alamat_ayah',
                'type' => 'textarea',
                'sort_order' => 22,
            ],

            [
                'label' => 'Desa Ayah',
                'name' => 'desa_ayah',
                'type' => 'text',
                'sort_order' => 23,
            ],

            [
                'label' => 'Kecamatan Ayah',
                'name' => 'kecamatan_ayah',
                'type' => 'text',
                'sort_order' => 24,
            ],

            [
                'label' => 'Kabupaten Ayah',
                'name' => 'kabupaten_ayah',
                'type' => 'text',
                'sort_order' => 25,
            ],

            [
                'label' => 'Tempat Lahir Ayah',
                'name' => 'tempat_lahir_ayah',
                'type' => 'text',
                'sort_order' => 26,
            ],
            [
                'label' => 'Tanggal Lahir Ayah',
                'name' => 'tanggal_lahir_ayah',
                'type' => 'date',
                'sort_order' => 27,
            ],

            // DATA PELAPOR

            [
                'label' => 'Nama Pelapor',
                'name' => 'nama_pelapor',
                'type' => 'text',
                'sort_order' => 28,
            ],

            [
                'label' => 'NIK Pelapor',
                'name' => 'nik_pelapor',
                'type' => 'text',
                'sort_order' => 29,
            ],

            [
                'label' => 'Umur Pelapor',
                'name' => 'umur_pelapor',
                'type' => 'number',
                'sort_order' => 30,
            ],

            [
                'label' => 'Tempat Lahir Pelapor',
                'name' => 'tempat_lahir_pelapor',
                'type' => 'text',
                'sort_order' => 31,
            ],

            [
                'label' => 'Tanggal Lahir Pelapor',
                'name' => 'tanggal_lahir_pelapor',
                'type' => 'date',
                'sort_order' => 32,
            ],

            [
                'label' => 'Pekerjaan Pelapor',
                'name' => 'pekerjaan_pelapor',
                'type' => 'text',
                'sort_order' => 33,
            ],

            [
                'label' => 'Desa Pelapor',
                'name' => 'desa_pelapor',
                'type' => 'text',
                'sort_order' => 34,
            ],

            [
                'label' => 'Kecamatan Pelapor',
                'name' => 'kecamatan_pelapor',
                'type' => 'text',
                'sort_order' => 35,
            ],

            [
                'label' => 'Kabupaten Pelapor',
                'name' => 'kabupaten_pelapor',
                'type' => 'text',
                'sort_order' => 36,
            ],

            [
                'label' => 'Provinsi Pelapor',
                'name' => 'provinsi_pelapor',
                'type' => 'text',
                'sort_order' => 37,
            ],

            [
                'label' => 'Hubungan Pelapor',
                'name' => 'hubungan_pelapor',
                'type' => 'text',
                'sort_order' => 38,
            ],

            // SAKSI 1

            [
                'label' => 'Nama Saksi 1',
                'name' => 'nama_saksi_1',
                'type' => 'text',
                'sort_order' => 39,
            ],

            [
                'label' => 'NIK Saksi 1',
                'name' => 'nik_saksi_1',
                'type' => 'text',
                'sort_order' => 40,
            ],

            [
                'label' => 'Tempat Lahir Saksi 1',
                'name' => 'tempat_lahir_saksi_1',
                'type' => 'text',
                'sort_order' => 41,
            ],

            [
                'label' => 'Tanggal Lahir Saksi 1',
                'name' => 'tanggal_lahir_saksi_1',
                'type' => 'date',
                'sort_order' => 42,
            ],

            [
                'label' => 'Umur Saksi 1',
                'name' => 'umur_saksi_1',
                'type' => 'number',
                'sort_order' => 43,
            ],

            [
                'label' => 'Pekerjaan Saksi 1',
                'name' => 'pekerjaan_saksi_1',
                'type' => 'text',
                'sort_order' => 44,
            ],

            [
                'label' => 'Alamat Saksi 1',
                'name' => 'alamat_saksi_1',
                'type' => 'textarea',
                'sort_order' => 45,
            ],

            // SAKSI 2

            [
                'label' => 'Nama Saksi 2',
                'name' => 'nama_saksi_2',
                'type' => 'text',
                'sort_order' => 46,
            ],

            [
                'label' => 'NIK Saksi 2',
                'name' => 'nik_saksi_2',
                'type' => 'text',
                'sort_order' => 47,
            ],

            [
                'label' => 'Tempat Lahir Saksi 2',
                'name' => 'tempat_lahir_saksi_2',
                'type' => 'text',
                'sort_order' => 48,
            ],

            [
                'label' => 'Tanggal Lahir Saksi 2',
                'name' => 'tanggal_lahir_saksi_2',
                'type' => 'date',
                'sort_order' => 49,
            ],

            [
                'label' => 'Umur Saksi 2',
                'name' => 'umur_saksi_2',
                'type' => 'number',
                'sort_order' => 50,
            ],

            [
                'label' => 'Pekerjaan Saksi 2',
                'name' => 'pekerjaan_saksi_2',
                'type' => 'text',
                'sort_order' => 51,
            ],

            [
                'label' => 'Alamat Saksi 2',
                'name' => 'alamat_saksi_2',
                'type' => 'textarea',
                'sort_order' => 52,
            ],

            // AKTA

            [
                'label' => 'Lokasi Disdukcapil',
                'name' => 'lokasi_disdukcapil',
                'type' => 'text',
                'sort_order' => 53,
            ],

            [
                'label' => 'Nomor/Tanggal Pendaftaran',
                'name' => 'nomor_tanggal_pendaftaran',
                'type' => 'text',
                'sort_order' => 54,
            ],

        ];

        $this->insertFields(
            $jenisSurat->id,
            $fields
        );
    }

    private function seedNikah(): void
    {
        $jenisSurat = JenisSurat::where(
            'kode_surat',
            'NIKAH'
        )->first();

        if (!$jenisSurat) {
            return;
        }

        $fields = [

            // STATUS PERKAWINAN

            [
                'label' => 'Status Calon Suami',
                'name' => 'status_suami',
                'type' => 'select',
                'options' => implode("\n", [
                    'Belum Kawin',
                    'Kawin',
                    'Cerai Hidup',
                    'Cerai Mati',
                ]),
                'sort_order' => 1,
            ],

            [
                'label' => 'Status Calon Istri',
                'name' => 'status_istri',
                'type' => 'select',
                'options' => implode("\n", [
                    'Belum Kawin',
                    'Kawin',
                    'Cerai Hidup',
                    'Cerai Mati',
                ]),
                'sort_order' => 2,
            ],

            // DATA AYAH

            [
                'label' => 'Nama Ayah',
                'name' => 'nama_ayah',
                'type' => 'text',
                'sort_order' => 3,
            ],

            [
                'label' => 'NIK Ayah',
                'name' => 'nik_ayah',
                'type' => 'text',
                'sort_order' => 4,
            ],

            [
                'label' => 'Tempat Lahir Ayah',
                'name' => 'tempat_lahir_ayah',
                'type' => 'text',
                'sort_order' => 5,
            ],

            [
                'label' => 'Tanggal Lahir Ayah',
                'name' => 'tanggal_lahir_ayah',
                'type' => 'date',
                'sort_order' => 6,
            ],

            [
                'label' => 'Kewarganegaraan Ayah',
                'name' => 'kewarganegaraan_ayah',
                'type' => 'text',
                'sort_order' => 7,
            ],

            [
                'label' => 'Agama Ayah',
                'name' => 'agama_ayah',
                'type' => 'text',
                'sort_order' => 8,
            ],

            [
                'label' => 'Pekerjaan Ayah',
                'name' => 'pekerjaan_ayah',
                'type' => 'text',
                'sort_order' => 9,
            ],

            [
                'label' => 'Alamat Ayah',
                'name' => 'alamat_ayah',
                'type' => 'textarea',
                'sort_order' => 10,
            ],

            // DATA IBU

            [
                'label' => 'Nama Ibu',
                'name' => 'nama_ibu',
                'type' => 'text',
                'sort_order' => 11,
            ],

            [
                'label' => 'NIK Ibu',
                'name' => 'nik_ibu',
                'type' => 'text',
                'sort_order' => 12,
            ],

            [
                'label' => 'Tempat Lahir Ibu',
                'name' => 'tempat_lahir_ibu',
                'type' => 'text',
                'sort_order' => 13,
            ],

            [
                'label' => 'Tanggal Lahir Ibu',
                'name' => 'tanggal_lahir_ibu',
                'type' => 'date',
                'sort_order' => 14,
            ],

            [
                'label' => 'Kewarganegaraan Ibu',
                'name' => 'kewarganegaraan_ibu',
                'type' => 'text',
                'sort_order' => 15,
            ],

            [
                'label' => 'Agama Ibu',
                'name' => 'agama_ibu',
                'type' => 'text',
                'sort_order' => 16,
            ],

            [
                'label' => 'Pekerjaan Ibu',
                'name' => 'pekerjaan_ibu',
                'type' => 'text',
                'sort_order' => 17,
            ],

            [
                'label' => 'Alamat Ibu',
                'name' => 'alamat_ibu',
                'type' => 'textarea',
                'sort_order' => 18,
            ],

            // DATA CALON SUAMI

            [
                'label' => 'Nama Calon Suami',
                'name' => 'calon_suami',
                'type' => 'text',
                'sort_order' => 19,
            ],

            [
                'label' => 'Bin Calon Suami',
                'name' => 'bin_suami',
                'type' => 'text',
                'sort_order' => 20,
            ],

            [
                'label' => 'NIK Calon Suami',
                'name' => 'nik_suami',
                'type' => 'text',
                'sort_order' => 21,
            ],

            [
                'label' => 'Tempat Lahir Calon Suami',
                'name' => 'tempat_lahir_suami',
                'type' => 'text',
                'sort_order' => 22,
            ],

            [
                'label' => 'Tanggal Lahir Calon Suami',
                'name' => 'tanggal_lahir_suami',
                'type' => 'date',
                'sort_order' => 23,
            ],

            [
                'label' => 'Jenis Kelamin Calon Suami',
                'name' => 'jenis_kelamin_suami',
                'type' => 'select',
                'options' => "Laki-laki\nPerempuan",
                'sort_order' => 24,
            ],

            [
                'label' => 'Kewarganegaraan Calon Suami',
                'name' => 'kewarganegaraan_suami',
                'type' => 'text',
                'sort_order' => 25,
            ],

            [
                'label' => 'Agama Calon Suami',
                'name' => 'agama_suami',
                'type' => 'text',
                'sort_order' => 26,
            ],

            [
                'label' => 'Pekerjaan Calon Suami',
                'name' => 'pekerjaan_suami',
                'type' => 'text',
                'sort_order' => 27,
            ],

            [
                'label' => 'Alamat Calon Suami',
                'name' => 'alamat_suami',
                'type' => 'textarea',
                'sort_order' => 28,
            ],

            // DATA CALON ISTRI

            [
                'label' => 'Nama Calon Istri',
                'name' => 'calon_istri',
                'type' => 'text',
                'sort_order' => 29,
            ],

            [
                'label' => 'Binti Calon Istri',
                'name' => 'binti_istri',
                'type' => 'text',
                'sort_order' => 30,
            ],

            [
                'label' => 'NIK Calon Istri',
                'name' => 'nik_istri',
                'type' => 'text',
                'sort_order' => 31,
            ],

            [
                'label' => 'Tempat Lahir Calon Istri',
                'name' => 'tempat_lahir_istri',
                'type' => 'text',
                'sort_order' => 32,
            ],

            [
                'label' => 'Tanggal Lahir Calon Istri',
                'name' => 'tanggal_lahir_istri',
                'type' => 'date',
                'sort_order' => 33,
            ],

            [
                'label' => 'Jenis Kelamin Calon Istri',
                'name' => 'jenis_kelamin_istri',
                'type' => 'select',
                'options' => "Laki-laki\nPerempuan",
                'sort_order' => 34,
            ],

            [
                'label' => 'Kewarganegaraan Calon Istri',
                'name' => 'kewarganegaraan_istri',
                'type' => 'text',
                'sort_order' => 35,
            ],

            [
                'label' => 'Agama Calon Istri',
                'name' => 'agama_istri',
                'type' => 'text',
                'sort_order' => 36,
            ],

            [
                'label' => 'Pekerjaan Calon Istri',
                'name' => 'pekerjaan_istri',
                'type' => 'text',
                'sort_order' => 37,
            ],

            [
                'label' => 'Alamat Calon Istri',
                'name' => 'alamat_istri',
                'type' => 'textarea',
                'sort_order' => 38,
            ],

            // KUA

            [
                'label' => 'KUA Kecamatan',
                'name' => 'kua_kecamatan',
                'type' => 'text',
                'sort_order' => 39,
            ],

            [
                'label' => 'Lokasi KUA',
                'name' => 'lokasi_kua',
                'type' => 'text',
                'sort_order' => 40,
            ],

            // DOKUMEN TAMBAHAN

            [
                'label' => 'Tanggal Diterima',
                'name' => 'tanggal_diterima',
                'type' => 'date',
                'sort_order' => 41,
            ],

            [
                'label' => 'Nama Pemohon',
                'name' => 'nama_pemohon',
                'type' => 'text',
                'sort_order' => 42,
            ],

            [
                'label' => 'Tanggal Penetapan',
                'name' => 'tanggal_penetapan',
                'type' => 'date',
                'sort_order' => 43,
            ],

            [
                'label' => 'Pengadilan Agama',
                'name' => 'pengadilan_agama',
                'type' => 'text',
                'sort_order' => 44,
            ],

            [
                'label' => 'Nama Anak Yang Diizinkan',
                'name' => 'anak_izin',
                'type' => 'text',
                'sort_order' => 45,
            ],

            [
                'label' => 'Umur Anak Yang Diizinkan',
                'name' => 'umur_anak_izin',
                'type' => 'number',
                'sort_order' => 46,
            ],

            [
                'label' => 'Pasangan Anak',
                'name' => 'pasangan_anak',
                'type' => 'text',
                'sort_order' => 47,
            ],

            [
                'label' => 'Nama Yang Meninggal',
                'name' => 'nama_meninggal',
                'type' => 'text',
                'sort_order' => 48,
            ],

            [
                'label' => 'Bin/Binti Yang Meninggal',
                'name' => 'bin_meninggal',
                'type' => 'text',
                'sort_order' => 49,
            ],

            [
                'label' => 'Tanggal Meninggal',
                'name' => 'tanggal_meninggal',
                'type' => 'date',
                'sort_order' => 50,
            ],

            [
                'label' => 'Tempat Meninggal',
                'name' => 'tempat_meninggal',
                'type' => 'text',
                'sort_order' => 51,
            ],

            [
                'label' => 'Sebab Kematian',
                'name' => 'sebab_kematian',
                'type' => 'text',
                'sort_order' => 52,
            ],

            [
                'label' => 'Pasangan Yang Meninggal',
                'name' => 'pasangan_meninggal',
                'type' => 'text',
                'sort_order' => 53,
            ],

        ];

        $this->insertFields(
            $jenisSurat->id,
            $fields
        );
    }

    private function insertFields(
        int $jenisSuratId,
        array $fields
    ): void {

        foreach ($fields as $field) {

            SuratField::updateOrCreate(
                [
                    'jenis_surat_id' => $jenisSuratId,
                    'name' => $field['name'],
                ],
                [
                    'label' => $field['label'],
                    'type' => $field['type'],
                    'placeholder' => $field['placeholder'] ?? null,
                    'is_required' => true,
                    'options' => $field['options'] ?? null,
                    'sort_order' => $field['sort_order'],
                ]
            );
        }
    }
}
