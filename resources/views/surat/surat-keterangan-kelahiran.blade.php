@php

    use Carbon\Carbon;

    Carbon::setLocale('id');

    $fields = $pengajuan->details->pluck('value', 'field.name');

    $formatDate = fn($date) => $date ? Carbon::parse($date)->translatedFormat('d F Y') : '-';

@endphp

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">

    <title>
        Surat Keterangan Kelahiran
    </title>

    <style>
        @page {
            margin: 2cm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.3;
            color: #000;
        }

        .page {
            page-break-after: always;
        }

        .page:last-child {
            page-break-after: auto;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        .kop h2,
        .kop h3,
        .kop p {
            margin: 0;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
            margin-top: 20px;
        }

        .nomor-surat {
            text-align: center;
            margin-bottom: 25px;
        }

        .paragraf {
            text-align: justify;
            margin-bottom: 10px;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
        }

        .data-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .no {
            width: 30px;
        }

        .label {
            width: 250px;
        }

        .colon {
            width: 15px;
            text-align: center;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 8px;
        }

        .ttd-area {
            width: 280px;
            margin-left: auto;
            margin-top: 20px;
            text-align: center;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .ttd-space {
            height: 55px;
        }

        .nama-pejabat {
            display: inline-block;
            min-width: 210px;
            padding-bottom: 2px;
            border-bottom: 1px solid #000;
            font-weight: bold;
        }
    </style>

</head>

<body>

    {{-- HALAMAN 1 --}}
    <div class="page">

        <div class="kop">

            <h3>
                PEMERINTAH KABUPATEN {{ strtoupper($village->kabupaten) }}
            </h3>

            <h3>
                KECAMATAN {{ strtoupper($village->kecamatan) }}
            </h3>

            <h2>
                DESA {{ strtoupper($village->nama_desa) }}
            </h2>

            <p>
                {{ $village->alamat_desa }}
            </p>

        </div>

        <div class="judul-surat">
            SURAT KETERANGAN KELAHIRAN
        </div>

        <div class="nomor-surat">
            Nomor : {{ $pengajuan->nomor_surat ?? '-' }}
        </div>

        <p class="paragraf">
            Yang bertanda tangan di bawah ini Kepala Desa
            {{ $village->nama_desa }},
            Kecamatan {{ $village->kecamatan }},
            Kabupaten {{ $village->kabupaten }},
            menerangkan dengan sebenarnya bahwa:
        </p>

        <table class="data-table">

            <tr>
                <td class="no">1.</td>
                <td class="label">Hari</td>
                <td class="colon">:</td>
                <td>{{ $fields['hari_lahir'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">2.</td>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_bayi'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="no">3.</td>
                <td class="label">Pukul</td>
                <td class="colon">:</td>
                <td>{{ $fields['waktu_lahir'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">4.</td>
                <td class="label">Tempat Kelahiran</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_bayi'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">5.</td>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td>{{ $fields['jenis_kelamin_bayi'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">6.</td>
                <td class="label">Nama Bayi</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_bayi'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">7.</td>
                <td class="label">Anak Ke</td>
                <td class="colon">:</td>
                <td>{{ $fields['anak_ke'] ?? '-' }}</td>
            </tr>

        </table>

        <div class="section-title">
            DATA IBU
        </div>

        <table class="data-table">

            <tr>
                <td class="no">8.</td>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">9.</td>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">10.</td>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">11.</td>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_ibu'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="no">12.</td>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td>{{ $fields['umur_ibu'] ?? '-' }} Tahun</td>
            </tr>

            <tr>
                <td class="no">13.</td>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">14.</td>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">15.</td>
                <td class="label">Desa</td>
                <td class="colon">:</td>
                <td>{{ $fields['desa_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">16.</td>
                <td class="label">Kecamatan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kecamatan_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">17.</td>
                <td class="label">Kabupaten</td>
                <td class="colon">:</td>
                <td>{{ $fields['kabupaten_ibu'] ?? '-' }}</td>
            </tr>

        </table>

        <div class="section-title">
            DATA AYAH
        </div>

        <table class="data-table">

            <tr>
                <td class="no">18.</td>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">19.</td>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">20.</td>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">21.</td>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_ayah'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="no">22.</td>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td>{{ $fields['umur_ayah'] ?? '-' }} Tahun</td>
            </tr>

            <tr>
                <td class="no">23.</td>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">24.</td>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">25.</td>
                <td class="label">Desa</td>
                <td class="colon">:</td>
                <td>{{ $fields['desa_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">26.</td>
                <td class="label">Kecamatan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kecamatan_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">27.</td>
                <td class="label">Kabupaten</td>
                <td class="colon">:</td>
                <td>{{ $fields['kabupaten_ayah'] ?? '-' }}</td>
            </tr>

        </table>

    </div>

    {{-- HALAMAN 2 --}}
    <div class="page">

        <div class="judul-surat">
            FORMULIR PELAPORAN KELAHIRAN
        </div>

        <p class="paragraf">
            Data pelapor yang melaporkan kelahiran bayi tersebut adalah sebagai berikut:
        </p>

        <table class="data-table">

            <tr>
                <td class="no">28.</td>
                <td class="label">Nama Pelapor</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">29.</td>
                <td class="label">NIK Pelapor</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">30.</td>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">31.</td>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_pelapor'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="no">32.</td>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td>{{ $fields['umur_pelapor'] ?? '-' }} Tahun</td>
            </tr>

            <tr>
                <td class="no">33.</td>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">34.</td>
                <td class="label">Desa/Kelurahan</td>
                <td class="colon">:</td>
                <td>{{ $fields['desa_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">35.</td>
                <td class="label">Kecamatan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kecamatan_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">36.</td>
                <td class="label">Kabupaten/Kota</td>
                <td class="colon">:</td>
                <td>{{ $fields['kabupaten_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">37.</td>
                <td class="label">Provinsi</td>
                <td class="colon">:</td>
                <td>{{ $fields['provinsi_pelapor'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">38.</td>
                <td class="label">Hubungan Dengan Bayi</td>
                <td class="colon">:</td>
                <td>{{ $fields['hubungan_pelapor'] ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <div class="section-title">
            PERMOHONAN PENERBITAN AKTA KELAHIRAN
        </div>

        <p class="paragraf">
            Dengan ini saya selaku pelapor mengajukan permohonan
            penerbitan Akta Kelahiran atas bayi yang datanya telah
            disebutkan pada halaman sebelumnya.
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Instansi Pelaksana</td>
                <td class="colon">:</td>
                <td>
                    Dinas Kependudukan dan Pencatatan Sipil
                    {{ $fields['lokasi_disdukcapil'] ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">Nomor / Tanggal Pendaftaran</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['nomor_tanggal_pendaftaran'] ?? '-' }}
                </td>
            </tr>

        </table>

        <p class="paragraf">
            Saya menyatakan bahwa seluruh data yang diberikan
            dalam surat ini adalah benar dan dapat dipertanggungjawabkan.
            Apabila di kemudian hari ditemukan ketidaksesuaian,
            maka saya bersedia menerima konsekuensi sesuai ketentuan
            peraturan perundang-undangan yang berlaku.
        </p>

        <div class="ttd-area">

            <div>

                {{ $village->nama_desa }},
                {{ $pengajuan->tanggal_selesai ? $formatDate($pengajuan->tanggal_selesai) : now()->translatedFormat('d F Y') }}

            </div>

            <div>
                Pelapor
            </div>

            <div class="ttd-space"></div>

            <div class="nama-pejabat">
                {{ strtoupper($fields['nama_pelapor'] ?? '-') }}
            </div>

        </div>

    </div>

    {{-- HALAMAN 3 --}}
    <div class="page">

        <div class="judul-surat">
            DATA SAKSI KELAHIRAN
        </div>

        <div class="section-title">
            SAKSI 1
        </div>

        <table class="data-table">

            <tr>
                <td class="no">39.</td>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_saksi_1'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">40.</td>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_saksi_1'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">41.</td>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_saksi_1'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">42.</td>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_saksi_1'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="no">43.</td>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td>{{ $fields['umur_saksi_1'] ?? '-' }} Tahun</td>
            </tr>

            <tr>
                <td class="no">44.</td>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_saksi_1'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">45.</td>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_saksi_1'] ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <div class="section-title">
            SAKSI 2
        </div>

        <table class="data-table">

            <tr>
                <td class="no">46.</td>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_saksi_2'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">47.</td>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_saksi_2'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">48.</td>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_saksi_2'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">49.</td>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_saksi_2'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="no">50.</td>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td>{{ $fields['umur_saksi_2'] ?? '-' }} Tahun</td>
            </tr>

            <tr>
                <td class="no">51.</td>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_saksi_2'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="no">52.</td>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_saksi_2'] ?? '-' }}</td>
            </tr>

        </table>

        <br><br>

        <p class="paragraf">
            Demikian surat keterangan kelahiran ini dibuat dengan sebenarnya
            berdasarkan data yang diberikan oleh pelapor dan saksi-saksi.
            Surat ini dipergunakan sebagai salah satu persyaratan penerbitan
            Akta Kelahiran pada Dinas Kependudukan dan Pencatatan Sipil.
        </p>

        <table style="width:100%; margin-top:40px;">

            <tr>

                <td style="width:50%; text-align:center;">

                    Saksi 1

                    <div style="height:80px;"></div>

                    <strong>
                        {{ strtoupper($fields['nama_saksi_1'] ?? '-') }}
                    </strong>

                </td>

                <td style="width:50%; text-align:center;">

                    Saksi 2

                    <div style="height:80px;"></div>

                    <strong>
                        {{ strtoupper($fields['nama_saksi_2'] ?? '-') }}
                    </strong>

                </td>

            </tr>

        </table>

        <div class="ttd-area">

            <div>

                {{ $village->nama_desa }},
                {{ $pengajuan->tanggal_selesai ? $formatDate($pengajuan->tanggal_selesai) : now()->translatedFormat('d F Y') }}

            </div>

            <div>
                Kepala Desa {{ $village->nama_desa }}
            </div>

            <div class="ttd-space"></div>

            <div class="nama-pejabat">
                {{ strtoupper($village->kepala_desa ?? '-') }}
            </div>

            @if ($village->nip_kepala_desa)
                <div style="margin-top:5px;">
                    NIP. {{ $village->nip_kepala_desa }}
                </div>
            @endif

        </div>

    </div>

</body>

</html>
