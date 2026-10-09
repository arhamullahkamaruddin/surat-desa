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
        Surat Pengantar Nikah
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

        .label {
            width: 250px;
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
            min-width: 220px;
            border-bottom: 1px solid #000;
            padding-bottom: 2px;
            font-weight: bold;
        }

        .section-title {
            font-weight: bold;
            margin-top: 15px;
            margin-bottom: 8px;
        }
    </style>

</head>

<body>

    @php

        use Carbon\Carbon;

        $fields = $pengajuan->details->pluck('value', 'field.name');

        $formatDate = fn($date) => $date ? Carbon::parse($date)->translatedFormat('d F Y') : '-';

    @endphp

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
            SURAT PENGANTAR NIKAH
        </div>

        <div class="nomor-surat">
            Nomor : {{ $pengajuan->nomor_surat }}
        </div>

        <p class="paragraf">
            Yang bertanda tangan di bawah ini Kepala Desa
            {{ $village->nama_desa }},
            Kecamatan {{ $village->kecamatan }},
            Kabupaten {{ $village->kabupaten }},
            menerangkan dengan sesungguhnya bahwa:
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Bin</td>
                <td class="colon">:</td>
                <td>{{ $fields['bin_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_suami'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td>{{ $fields['jenis_kelamin_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kewarganegaraan_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['agama_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Status Perkawinan</td>
                <td class="colon">:</td>
                <td>{{ $fields['status_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_suami'] ?? '-' }}</td>
            </tr>

        </table>

        <p class="paragraf">
            Adalah benar warga Desa {{ $village->nama_desa }}
            yang akan melangsungkan pernikahan dengan:
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Nama Lengkap</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Binti</td>
                <td class="colon">:</td>
                <td>{{ $fields['binti_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tempat Lahir</td>
                <td class="colon">:</td>
                <td>{{ $fields['tempat_lahir_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_lahir_istri'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Jenis Kelamin</td>
                <td class="colon">:</td>
                <td>{{ $fields['jenis_kelamin_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kewarganegaraan_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['agama_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Status Perkawinan</td>
                <td class="colon">:</td>
                <td>{{ $fields['status_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_istri'] ?? '-' }}</td>
            </tr>

        </table>

        <p class="paragraf">
            Pernikahan direncanakan dilaksanakan pada Kantor Urusan Agama
            Kecamatan {{ $fields['kua_kecamatan'] ?? '-' }}
            di {{ $fields['lokasi_kua'] ?? '-' }}.
        </p>

        <p class="paragraf">
            Demikian surat pengantar ini dibuat untuk dipergunakan
            sebagaimana mestinya.
        </p>

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

    {{-- HALAMAN 2 --}}
    <div class="page">

        <div class="judul-surat">
            PERMOHONAN KEHENDAK NIKAH
        </div>

        <p class="paragraf">
            Yang bertanda tangan di bawah ini mengajukan permohonan
            pencatatan kehendak nikah kepada Pegawai Pencatat Nikah
            Kantor Urusan Agama Kecamatan
            {{ $fields['kua_kecamatan'] ?? '-' }}.
        </p>

        <div class="section-title">
            DATA CALON SUAMI
        </div>

        <table class="data-table">

            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Bin</td>
                <td class="colon">:</td>
                <td>{{ $fields['bin_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tempat / Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['tempat_lahir_suami'] ?? '-' }},
                    {{ $formatDate($fields['tanggal_lahir_suami'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kewarganegaraan_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['agama_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Status Perkawinan</td>
                <td class="colon">:</td>
                <td>{{ $fields['status_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_suami'] ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <div class="section-title">
            DATA CALON ISTRI
        </div>

        <table class="data-table">

            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Binti</td>
                <td class="colon">:</td>
                <td>{{ $fields['binti_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tempat / Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['tempat_lahir_istri'] ?? '-' }},
                    {{ $formatDate($fields['tanggal_lahir_istri'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Kewarganegaraan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kewarganegaraan_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['agama_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Status Perkawinan</td>
                <td class="colon">:</td>
                <td>{{ $fields['status_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_istri'] ?? '-' }}</td>
            </tr>

        </table>

        <p class="paragraf">
            Dengan ini kami memohon agar pernikahan tersebut dapat dicatat
            dan dilaksanakan sesuai ketentuan yang berlaku pada Kantor
            Urusan Agama Kecamatan
            {{ $fields['kua_kecamatan'] ?? '-' }}.
        </p>

        <table style="width:100%; margin-top:40px;">

            <tr>

                <td style="width:50%; text-align:center;">

                    Calon Suami

                    <div style="height:80px;"></div>

                    <strong>
                        {{ strtoupper($fields['calon_suami'] ?? '-') }}
                    </strong>

                </td>

                <td style="width:50%; text-align:center;">

                    Calon Istri

                    <div style="height:80px;"></div>

                    <strong>
                        {{ strtoupper($fields['calon_istri'] ?? '-') }}
                    </strong>

                </td>

            </tr>

        </table>

    </div>

    {{-- HALAMAN 3 --}}
    <div class="page">

        <div class="judul-surat">
            PERMOHONAN PENCATATAN ITSBAT NIKAH
        </div>

        <p class="paragraf">
            Yang bertanda tangan di bawah ini:
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Nama Pemohon</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_pemohon'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tanggal Diterima</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_diterima'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Pengadilan Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['pengadilan_agama'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tanggal Penetapan</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_penetapan'] ?? null) }}
                </td>
            </tr>

        </table>

        <p class="paragraf">
            Dengan ini mengajukan permohonan pencatatan itsbat nikah
            berdasarkan penetapan Pengadilan Agama sebagaimana tersebut
            di atas untuk selanjutnya dicatatkan pada Kantor Urusan Agama
            Kecamatan {{ $fields['kua_kecamatan'] ?? '-' }}.
        </p>

        <p class="paragraf">
            Sebagai bahan pertimbangan, bersama ini disampaikan data
            para pihak sebagai berikut:
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Nama Suami</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Nama Istri</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">KUA Tujuan</td>
                <td class="colon">:</td>
                <td>{{ $fields['kua_kecamatan'] ?? '-' }}</td>
            </tr>

        </table>

        <p class="paragraf">
            Demikian permohonan ini dibuat dengan sebenarnya untuk
            dipergunakan sebagaimana mestinya.
        </p>

        <div class="ttd-area">

            <div>

                {{ $village->nama_desa }},
                {{ $pengajuan->tanggal_selesai ? $formatDate($pengajuan->tanggal_selesai) : now()->translatedFormat('d F Y') }}

            </div>

            <div>
                Pemohon
            </div>

            <div class="ttd-space"></div>

            <div class="nama-pejabat">
                {{ strtoupper($fields['nama_pemohon'] ?? '-') }}
            </div>

        </div>

    </div>

    {{-- HALAMAN 4 --}}
    <div class="page">

        <div class="judul-surat">
            SURAT PERSETUJUAN CALON MEMPELAI
        </div>

        <p class="paragraf">
            Yang bertanda tangan di bawah ini menyatakan dengan sesungguhnya
            bahwa kami saling menyetujui untuk melangsungkan perkawinan
            sesuai dengan ketentuan agama dan peraturan perundang-undangan
            yang berlaku.
        </p>

        <br>

        <div class="section-title">
            CALON SUAMI
        </div>

        <table class="data-table">

            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Bin</td>
                <td class="colon">:</td>
                <td>{{ $fields['bin_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tempat / Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['tempat_lahir_suami'] ?? '-' }},
                    {{ $formatDate($fields['tanggal_lahir_suami'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['agama_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_suami'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_suami'] ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <div class="section-title">
            CALON ISTRI
        </div>

        <table class="data-table">

            <tr>
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td>{{ $fields['calon_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Binti</td>
                <td class="colon">:</td>
                <td>{{ $fields['binti_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Tempat / Tanggal Lahir</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['tempat_lahir_istri'] ?? '-' }},
                    {{ $formatDate($fields['tanggal_lahir_istri'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Agama</td>
                <td class="colon">:</td>
                <td>{{ $fields['agama_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_istri'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_istri'] ?? '-' }}</td>
            </tr>

        </table>

        <br><br>

        <p class="paragraf">
            Dengan penuh kesadaran dan tanpa paksaan dari pihak manapun,
            kami menyatakan persetujuan untuk melangsungkan perkawinan.
        </p>

        <table style="width:100%; margin-top:50px;">

            <tr>

                <td style="width:50%; text-align:center;">

                    Calon Suami

                    <div style="height:90px;"></div>

                    <strong>
                        {{ strtoupper($fields['calon_suami'] ?? '-') }}
                    </strong>

                </td>

                <td style="width:50%; text-align:center;">

                    Calon Istri

                    <div style="height:90px;"></div>

                    <strong>
                        {{ strtoupper($fields['calon_istri'] ?? '-') }}
                    </strong>

                </td>

            </tr>

        </table>

    </div>

    {{-- HALAMAN 5 --}}
    <div class="page">

        <div class="judul-surat">
            SURAT IZIN ORANG TUA
        </div>

        <p class="paragraf">
            Yang bertanda tangan di bawah ini:
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Nama Ayah</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK Ayah</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan Ayah</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_ayah'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat Ayah</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_ayah'] ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <table class="data-table">

            <tr>
                <td class="label">Nama Ibu</td>
                <td class="colon">:</td>
                <td>{{ $fields['nama_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">NIK Ibu</td>
                <td class="colon">:</td>
                <td>{{ $fields['nik_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Pekerjaan Ibu</td>
                <td class="colon">:</td>
                <td>{{ $fields['pekerjaan_ibu'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Alamat Ibu</td>
                <td class="colon">:</td>
                <td>{{ $fields['alamat_ibu'] ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <p class="paragraf">
            Selaku orang tua / wali dari:
        </p>

        <table class="data-table">

            <tr>
                <td class="label">Nama Anak</td>
                <td class="colon">:</td>
                <td>{{ $fields['anak_izin'] ?? '-' }}</td>
            </tr>

            <tr>
                <td class="label">Umur</td>
                <td class="colon">:</td>
                <td>{{ $fields['umur_anak_izin'] ?? '-' }} Tahun</td>
            </tr>

            <tr>
                <td class="label">Akan Menikah Dengan</td>
                <td class="colon">:</td>
                <td>{{ $fields['pasangan_anak'] ?? '-' }}</td>
            </tr>

        </table>

        <p class="paragraf">
            Dengan ini memberikan izin dan persetujuan sepenuhnya
            kepada anak kami tersebut untuk melangsungkan pernikahan
            sesuai ketentuan agama dan peraturan perundang-undangan
            yang berlaku.
        </p>

        <p class="paragraf">
            Demikian surat izin ini dibuat dengan sebenarnya untuk
            dipergunakan sebagaimana mestinya.
        </p>

        <table style="width:100%; margin-top:60px;">

            <tr>

                <td style="width:50%; text-align:center;">

                    Ayah

                    <div style="height:90px;"></div>

                    <strong>
                        {{ strtoupper($fields['nama_ayah'] ?? '-') }}
                    </strong>

                </td>

                <td style="width:50%; text-align:center;">

                    Ibu

                    <div style="height:90px;"></div>

                    <strong>
                        {{ strtoupper($fields['nama_ibu'] ?? '-') }}
                    </strong>

                </td>

            </tr>

        </table>

    </div>

    {{-- HALAMAN 6 --}}
    <div class="page">

        <div class="judul-surat">
            SURAT KETERANGAN KEMATIAN
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
                <td class="label">Nama</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['nama_meninggal'] ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">Bin / Binti</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['bin_meninggal'] ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">Tanggal Meninggal</td>
                <td class="colon">:</td>
                <td>
                    {{ $formatDate($fields['tanggal_meninggal'] ?? null) }}
                </td>
            </tr>

            <tr>
                <td class="label">Tempat Meninggal</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['tempat_meninggal'] ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">Sebab Kematian</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['sebab_kematian'] ?? '-' }}
                </td>
            </tr>

            <tr>
                <td class="label">Pasangan Yang Ditinggalkan</td>
                <td class="colon">:</td>
                <td>
                    {{ $fields['pasangan_meninggal'] ?? '-' }}
                </td>
            </tr>

        </table>

        <p class="paragraf">
            Berdasarkan keterangan keluarga dan data yang ada,
            yang bersangkutan benar telah meninggal dunia pada
            tanggal tersebut di atas.
        </p>

        <p class="paragraf">
            Surat keterangan ini dibuat sebagai salah satu
            kelengkapan administrasi pernikahan dan untuk
            dipergunakan sebagaimana mestinya.
        </p>

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
