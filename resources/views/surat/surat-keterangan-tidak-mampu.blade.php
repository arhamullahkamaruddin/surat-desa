@php

use Carbon\Carbon;

Carbon::setLocale('id');

$fields = $pengajuan
    ->details
    ->pluck('value', 'field.name');

$formatDate = fn ($date)
    => $date
        ? Carbon::parse($date)
            ->translatedFormat('d F Y')
        : '-';

@endphp

<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <title>
        Surat Keterangan Tidak Mampu
    </title>

    <style>

        @page {
            margin: 2cm;
        }

        * {
            box-sizing: border-box;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.3;
            color: #000;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        .kop h2,
        .kop h3,
        .kop p {
            margin: 0;
        }

        .kop h2 {
            font-size: 16pt;
            font-weight: bold;
        }

        .kop h3 {
            font-size: 14pt;
            font-weight: bold;
        }

        .kop p {
            font-size: 11pt;
            margin-top: 3px;
        }

        .judul {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
            margin-top: 20px;
        }

        .nomor {
            text-align: center;
            margin-bottom: 25px;
        }

        .paragraf {
            text-align: justify;
            margin-bottom: 10px;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0 15px;
        }

        .table-data td {
            padding: 2px 0;
            vertical-align: top;
        }

        .label {
            width: 220px;
        }

        .colon {
            width: 15px;
            text-align: center;
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

    <div class="kop">

        <h2>
            PEMERINTAH DESA {{ strtoupper($village->nama_desa) }}
        </h2>

        <h3>
            KECAMATAN {{ strtoupper($village->kecamatan) }}
        </h3>

        <h3>
            KABUPATEN {{ strtoupper($village->kabupaten) }}
        </h3>

        <p>
            {{ $village->alamat_desa }}
        </p>

    </div>

    <div class="judul">
        SURAT KETERANGAN TIDAK MAMPU
    </div>

    <div class="nomor">
        Nomor : {{ $pengajuan->nomor_surat ?? '-' }}
    </div>

    <p class="paragraf">

        Yang bertanda tangan di bawah ini Kepala Desa
        {{ $village->nama_desa }},
        Kecamatan {{ $village->kecamatan }},
        Kabupaten {{ $village->kabupaten }},
        menerangkan dengan sebenarnya bahwa:

    </p>

    <table class="table-data">

        <tr>
            <td class="label">Nama Anak</td>
            <td class="colon">:</td>
            <td>{{ $fields['nama_anak'] ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">
                Tempat / Tanggal Lahir
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['tempat_lahir_anak'] ?? '-' }},
                {{ !empty($fields['tanggal_lahir_anak'])
                    ? Carbon::parse($fields['tanggal_lahir_anak'])->translatedFormat('d F Y')
                    : '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Nama Orang Tua / Wali
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['nama_ortu'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Pekerjaan Orang Tua / Wali
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['pekerjaan_ortu'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Status Tempat Tinggal
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['status_tempat_tinggal'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Asal Sekolah
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['asal_sekolah'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Kecamatan Sekolah
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['kecamatan_sekolah'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Kabupaten/Kota Sekolah
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['kabupaten_sekolah'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Provinsi Sekolah
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['provinsi_sekolah'] ?? '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">
                Tahun Ajaran
            </td>

            <td class="colon">:</td>

            <td>
                {{ $fields['tahun_ajaran'] ?? '-' }}
            </td>
        </tr>

    </table>

    <p class="paragraf">

        Berdasarkan data dan sepengetahuan kami,
        keluarga tersebut benar termasuk keluarga
        yang kurang mampu secara ekonomi.

    </p>

    <p class="paragraf">

        Surat ini dibuat sebagai salah satu persyaratan
        untuk keperluan pendidikan pada
        <strong>
            {{ $fields['asal_sekolah'] ?? '-' }}
        </strong>
        Tahun Ajaran
        <strong>
            {{ $fields['tahun_ajaran'] ?? '-' }}
        </strong>.

    </p>

    <p class="paragraf">

        Demikian surat keterangan ini dibuat dengan sebenarnya
        untuk dipergunakan sebagaimana mestinya.

    </p>

    <div class="ttd-area">

        <div>

            {{ $village->nama_desa }},
            {{ $pengajuan->tanggal_selesai
                ? Carbon::parse($pengajuan->tanggal_selesai)->translatedFormat('d F Y')
                : now()->translatedFormat('d F Y') }}

        </div>

        <div>
            Kepala Desa {{ $village->nama_desa }}
        </div>

        <div class="ttd-space"></div>

        <div class="nama-pejabat">
            {{ strtoupper($village->kepala_desa ?? '-') }}
        </div>

        @if($village->nip_kepala_desa)

            <div style="margin-top:5px;">
                NIP. {{ $village->nip_kepala_desa }}
            </div>

        @endif

    </div>

</body>

</html>
