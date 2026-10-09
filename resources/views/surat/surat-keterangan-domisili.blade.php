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
        Surat Keterangan Domisili
    </title>

    <style>
        @page {
            margin: 2.5cm;
        }

        body {
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.6;
            color: #000;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        .judul {
            text-align: center;
            margin-top: 20px;
            margin-bottom: 5px;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
        }

        .nomor {
            text-align: center;
            margin-bottom: 30px;
        }

        .table-data {
            width: 100%;
            border-collapse: collapse;
            margin: 15px 0;
        }

        .table-data td {
            padding: 3px 0;
            vertical-align: top;
        }

        .label {
            width: 180px;
        }

        .colon {
            width: 15px;
            text-align: center;
        }

        .paragraf {
            text-align: justify;
            margin-bottom: 12px;
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


    <div class="header">

        <h3 style="margin:0">
            PEMERINTAH DESA {{ strtoupper($village->nama_desa) }}
        </h3>

        <div>
            Kecamatan {{ strtoupper($village->kecamatan) }},
            Kabupaten {{ strtoupper($village->kabupaten) }}
        </div>

        <div>
            {{ $village->alamat_desa }}
        </div>

    </div>

    <hr>

    <div class="judul">
        SURAT KETERANGAN DOMISILI
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
            <td class="label">Nama</td>
            <td class="colon">:</td>
            <td>{{ $user->name ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">NIK</td>
            <td class="colon">:</td>
            <td>{{ $user->nik ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">
                Tempat / Tanggal Lahir
            </td>

            <td class="colon">:</td>

            <td>
                {{ $user->tempat_lahir ?? '-' }},
                {{ $user->tanggal_lahir ? Carbon::parse($user->tanggal_lahir)->translatedFormat('d F Y') : '-' }}
            </td>
        </tr>

        <tr>
            <td class="label">Jenis Kelamin</td>
            <td class="colon">:</td>
            <td>{{ $user->jenis_kelamin ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Agama</td>
            <td class="colon">:</td>
            <td>{{ $user->agama ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Pekerjaan</td>
            <td class="colon">:</td>
            <td>{{ $user->pekerjaan ?? '-' }}</td>
        </tr>

        <tr>
            <td class="label">Alamat</td>
            <td class="colon">:</td>

            <td>

                {{ $user->alamat ?? '-' }}

                @if ($village->uses_rt_rw)
                    RT {{ $user->rt ?? '-' }}
                    /
                    RW {{ $user->rw ?? '-' }}
                @endif

            </td>

        </tr>

    </table>

    <p class="paragraf">

        Berdasarkan data dan sepengetahuan kami,
        yang bersangkutan benar merupakan penduduk
        Desa {{ $village->nama_desa }}
        dan berdomisili pada alamat tersebut di atas.

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

        @if ($village->nip_kepala_desa)
            <div style="margin-top:5px;">
                NIP. {{ $village->nip_kepala_desa }}
            </div>
        @endif

    </div>


</body>

</html>
