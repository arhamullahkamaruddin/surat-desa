<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Kelahiran</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            color: #222;
        }

        .container {
            max-width: 1320px;
            margin: 30px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 400px 1fr;
            gap: 24px;
            align-items: start;
        }

        .panel {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, .08);
            height: auto;
            max-height: none;
            overflow: visible;
        }

        .panel h2 {
            margin: 0 0 14px;
            font-size: 20px;
        }

        .panel h3 {
            margin: 18px 0 10px;
            font-size: 15px;
            border-bottom: 1px solid #ddd;
            padding-bottom: 6px;
        }

        .form-group {
            margin-bottom: 12px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        label {
            display: block;
            font-size: 13px;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 64px;
            resize: vertical;
        }

        .btn-group {
            display: flex;
            gap: 10px;
            margin-top: 18px;
        }

        button {
            border: none;
            border-radius: 8px;
            padding: 11px 14px;
            font-size: 14px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-preview {
            background: #0d6efd;
            color: white;
            flex: 1;
        }

        .btn-download {
            background: #198754;
            color: white;
            flex: 1;
        }

        .surat-wrapper {
            background: #d9dde5;
            padding: 24px;
            overflow-x: auto;
        }

        .page {
            width: 210mm;
            min-height: 297mm;
            margin: 0 auto 24px;
            background: #fff;
            padding: 14mm 18mm;
            font-family: "Times New Roman", serif;
            font-size: 11pt;
            line-height: 1.18;
            color: #000;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 6px;
            margin-bottom: 10px;
        }

        .kop h3,
        .kop h2,
        .kop p {
            margin: 0;
        }

        .kop h3 {
            font-size: 13pt;
            font-weight: bold;
        }

        .kop h2 {
            font-size: 14.5pt;
            font-weight: bold;
        }

        .kop p {
            font-size: 10pt;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 13pt;
            margin: 8px 0 2px;
        }

        .nomor-surat {
            text-align: center;
            margin-bottom: 10px;
        }

        .paragraf {
            margin: 0 0 5px;
            text-align: justify;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2px 0 5px;
        }

        .data-table td {
            padding: 1px 0;
            vertical-align: top;
        }

        .no {
            width: 28px;
        }

        .label {
            width: 205px;
        }

        .colon {
            width: 12px;
            text-align: center;
        }

        .ttd-right {
            width: 240px;
            margin-left: auto;
            margin-top: 8px;
            text-align: center;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .ttd-space {
            height: 42px;
        }

        .ttd-name {
            font-weight: bold;
            text-decoration: underline;
        }

        .page-title-small {
            font-size: 11pt;
            line-height: 1.2;
        }

        .akta-table {
            width: 100%;
            border-collapse: collapse;
            margin: 6px 0;
            font-size: 10pt;
            table-layout: fixed;
        }

        .akta-table th,
        .akta-table td {
            border: 1px solid #000;
            padding: 3px;
            vertical-align: top;
            text-align: left;
            word-break: normal;
            overflow-wrap: break-word;
        }

        .akta-table th {
            text-align: center;
            font-weight: bold;
        }

        .lampiran-list {
            margin-top: 4px;
            padding-left: 20px;
        }

        .lampiran-list li {
            margin-bottom: 2px;
        }

        .verifikasi-pelapor-row {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-top: 18px;
            width: 100%;
            page-break-inside: avoid;
            break-inside: avoid;
        }

        .verifikasi-box {
            width: 260px;
        }

        .verifikasi-table {
            width: 240px;
            border-collapse: collapse;
            table-layout: fixed;
            font-size: 11pt;
            font-weight: bold;
        }

        .verifikasi-table td {
            border: 1px solid #000;
            padding: 2px 8px;
            vertical-align: middle;
            white-space: nowrap;
            word-break: normal;
            overflow-wrap: normal;
        }

        .verifikasi-label {
            text-align: center;
            width: 120px;
        }

        .verifikasi-role {
            text-align: left;
            width: 120px;
        }

        .pelapor-box {
            width: 260px;
            text-align: center;
            font-size: 11.5pt;
        }

        .pelapor-name {
            margin-top: 55px;
            font-weight: bold;
            white-space: nowrap;
        }

        @media (max-width: 980px) {
            .container {
                grid-template-columns: 1fr;
            }

            .panel {
                max-height: none;
            }
        }

        @media print {
            body {
                background: white;
                margin: 0;
                padding: 0;
            }

            body * {
                visibility: hidden;
            }

            #areaSurat,
            #areaSurat * {
                visibility: visible;
            }

            #areaSurat {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                padding: 0;
                margin: 0;
                background: white;
            }

            .surat-wrapper {
                padding: 0;
                margin: 0;
                background: white;
            }

            .page {
                width: 210mm;
                min-height: auto;
                height: auto;
                margin: 0;
                padding: 14mm 18mm;
                overflow: visible;
                page-break-after: always;
                break-after: page;
            }

            .page:last-child {
                page-break-after: auto;
                break-after: auto;
            }

            .ttd-space {
                height: 42px;
            }

            .ttd-right {
                margin-top: 8px;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .verifikasi-pelapor-row {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                page-break-inside: avoid;
                break-inside: avoid;
            }

            .verifikasi-table {
                table-layout: fixed;
            }

            .verifikasi-table td {
                white-space: nowrap;
                word-break: normal;
                overflow-wrap: normal;
            }

            @page {
                size: A4 portrait;
                margin: 0;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel">
            <h2>Form Surat Keterangan Kelahiran</h2>

            <h3>Data Surat</h3>

            <div class="form-group">
                <label>Nomor Surat</label>
                <input id="nomorSurat" placeholder="Nomor surat" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Desa</label>
                    <input id="namaDesa" value="Laliko" />
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input id="kecamatanSurat" value="Campalagian" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kabupaten</label>
                    <input id="kabupatenSurat" value="Polewali Mandar" />
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <input id="provinsiSurat" value="Sulawesi Barat" />
                </div>
            </div>

            <div class="form-group">
                <label>Tanggal Surat</label>
                <input type="date" id="tanggalSurat" />
            </div>

            <div class="form-group">
                <label>Nama Kepala Desa</label>
                <input id="namaKepalaDesa" placeholder="Nama Kepala Desa" />
            </div>

            <h3>Data Bayi</h3>

            <div class="form-row">
                <div class="form-group">
                    <label>Hari Lahir</label>
                    <input id="hariLahir" placeholder="Contoh: Senin" />
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" id="tanggalLahir" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Pukul</label>
                    <input type="time" id="waktuLahir" />
                </div>

                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input id="tempatLahir" placeholder="Tempat lahir" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Kelamin Bayi</label>
                    <select id="jenisKelaminBayi">
                        <option>Laki-laki</option>
                        <option>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Nama Bayi</label>
                    <input id="namaBayi" placeholder="Nama bayi" />
                </div>
            </div>

            <div class="form-group">
                <label>Anak Ke</label>
                <input id="anakKe" placeholder="Contoh: 1" />
            </div>

            <h3>Data Ibu</h3>

            <div class="form-group">
                <label>Nama Ibu</label>
                <input id="namaIbu" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>NIK Ibu</label>
                    <input id="nikIbu" />
                </div>

                <div class="form-group">
                    <label>Umur Ibu</label>
                    <input id="umurIbu" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir Ibu</label>
                    <input id="tempatLahirIbu" />
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir Ibu</label>
                    <input type="date" id="tanggalLahirIbu" />
                </div>
            </div>

            <div class="form-group">
                <label>Pekerjaan Ibu</label>
                <input id="pekerjaanIbu" />
            </div>

            <div class="form-group">
                <label>Alamat Ibu</label>
                <textarea id="alamatIbu"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Desa Ibu</label>
                    <input id="desaIbu" />
                </div>

                <div class="form-group">
                    <label>Kecamatan Ibu</label>
                    <input id="kecIbu" />
                </div>
            </div>

            <div class="form-group">
                <label>Kabupaten Ibu</label>
                <input id="kabIbu" />
            </div>

            <h3>Data Ayah</h3>

            <div class="form-group">
                <label>Nama Ayah</label>
                <input id="namaAyah" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>NIK Ayah</label>
                    <input id="nikAyah" />
                </div>

                <div class="form-group">
                    <label>Umur Ayah</label>
                    <input id="umurAyah" />
                </div>
            </div>

            <div class="form-group">
                <label>Pekerjaan Ayah</label>
                <input id="pekerjaanAyah" />
            </div>

            <div class="form-group">
                <label>Alamat Ayah</label>
                <textarea id="alamatAyah"></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Desa Ayah</label>
                    <input id="desaAyah" />
                </div>

                <div class="form-group">
                    <label>Kecamatan Ayah</label>
                    <input id="kecAyah" />
                </div>
            </div>

            <div class="form-group">
                <label>Kabupaten Ayah</label>
                <input id="kabAyah" />
            </div>

            <h3>Data Pelapor</h3>

            <div class="form-group">
                <label>Nama Pelapor</label>
                <input id="namaPelapor" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>NIK Pelapor</label>
                    <input id="nikPelapor" />
                </div>

                <div class="form-group">
                    <label>Umur Pelapor</label>
                    <input id="umurPelapor" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir Pelapor</label>
                    <input id="tempatLahirPelapor" />
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir Pelapor</label>
                    <input type="date" id="tanggalLahirPelapor" />
                </div>
            </div>

            <div class="form-group">
                <label>Pekerjaan Pelapor</label>
                <input id="pekerjaanPelapor" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Desa Pelapor</label>
                    <input id="desaPelapor" />
                </div>

                <div class="form-group">
                    <label>Kecamatan Pelapor</label>
                    <input id="kecPelapor" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kabupaten Pelapor</label>
                    <input id="kabPelapor" />
                </div>

                <div class="form-group">
                    <label>Provinsi Pelapor</label>
                    <input id="provPelapor" />
                </div>
            </div>

            <div class="form-group">
                <label>Hubungan Pelapor dengan Bayi</label>
                <input id="hubunganPelapor" />
            </div>

            <h3>Data Saksi</h3>

            <div class="form-group">
                <label>Nama Saksi 1</label>
                <input id="namaSaksi1" />
            </div>

            <div class="form-group">
                <label>NIK Saksi 1</label>
                <input id="nikSaksi1" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir Saksi 1</label>
                    <input id="tempatLahirSaksi1" />
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir Saksi 1</label>
                    <input type="date" id="tanggalLahirSaksi1" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Umur Saksi 1</label>
                    <input id="umurSaksi1" />
                </div>

                <div class="form-group">
                    <label>Pekerjaan Saksi 1</label>
                    <input id="pekerjaanSaksi1" />
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Saksi 1</label>
                <textarea id="alamatSaksi1"></textarea>
            </div>

            <div class="form-group">
                <label>Nama Saksi 2</label>
                <input id="namaSaksi2" />
            </div>

            <div class="form-group">
                <label>NIK Saksi 2</label>
                <input id="nikSaksi2" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir Saksi 2</label>
                    <input id="tempatLahirSaksi2" />
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir Saksi 2</label>
                    <input type="date" id="tanggalLahirSaksi2" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Umur Saksi 2</label>
                    <input id="umurSaksi2" />
                </div>

                <div class="form-group">
                    <label>Pekerjaan Saksi 2</label>
                    <input id="pekerjaanSaksi2" />
                </div>
            </div>

            <div class="form-group">
                <label>Alamat Saksi 2</label>
                <textarea id="alamatSaksi2"></textarea>
            </div>

            <h3>Permohonan Akta</h3>

            <div class="form-row">
                <div class="form-group">
                    <label>Lokasi Disdukcapil</label>
                    <input id="lokasiDisdukcapil" placeholder="Contoh: Polewali" />
                </div>

                <div class="form-group">
                    <label>No/Tgl Pendaftaran</label>
                    <input id="noTanggalPendaftaran" />
                </div>
            </div>

            <div class="btn-group">
                <button class="btn-preview" onclick="updateSurat()">Lihat Hasil</button>
                <button class="btn-download" onclick="downloadPDF()">Download PDF</button>
            </div>
        </div>

        <div class="surat-wrapper" id="areaSurat">
            <div class="page">
                <div class="kop">
                    <h3>PEMERINTAH KABUPATEN <span data-out="kabupatenSurat">POLEWALI MANDAR</span></h3>
                    <h3>KECAMATAN <span data-out="kecamatanSurat">CAMPALAGIAN</span></h3>
                    <h2>DESA <span data-out="namaDesa">LALIKO</span></h2>
                    <p>
                        Desa <span data-out="namaDesa">Laliko</span>,
                        Kecamatan <span data-out="kecamatanSurat">Campalagian</span>,
                        Kabupaten <span data-out="kabupatenSurat">Polewali Mandar</span>
                        Provinsi <span data-out="provinsiSurat">Sulawesi Barat</span>, 91357
                    </p>
                </div>

                <div class="judul-surat">SURAT KETERANGAN KELAHIRAN</div>
                <div class="nomor-surat">Nomor : <span data-out="nomorSurat">…………………………..</span></div>

                <p class="paragraf">
                    Yang bertanda tangan di bawah ini Kepala Desa <span data-out="namaDesa">Laliko</span>,
                    Kecamatan <span data-out="kecamatanSurat">Campalagian</span>,
                    Kabupaten <span data-out="kabupatenSurat">Polewali Mandar</span>,
                    Provinsi <span data-out="provinsiSurat">Sulawesi Barat</span>
                    menerangkan dengan sebenarnya bahwa pada:
                </p>

                <table class="data-table">
                    <tr>
                        <td class="no">1.</td>
                        <td class="label">Hari</td>
                        <td class="colon">:</td>
                        <td data-out="hariLahir">[form_hari]</td>
                    </tr>
                    <tr>
                        <td class="no">2.</td>
                        <td class="label">Tanggal</td>
                        <td class="colon">:</td>
                        <td data-date="tanggalLahir">[form_tanggallahir]</td>
                    </tr>
                    <tr>
                        <td class="no">3.</td>
                        <td class="label">Pukul</td>
                        <td class="colon">:</td>
                        <td><span data-out="waktuLahir">[form_waktu_lahir]</span></td>
                    </tr>
                    <tr>
                        <td class="no">4.</td>
                        <td class="label">Tempat</td>
                        <td class="colon">:</td>
                        <td data-out="tempatLahir">[form_tempatlahir]</td>
                    </tr>
                    <tr>
                        <td class="no">5.</td>
                        <td class="label">Telah lahir seorang anak</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="jenisKelaminBayi">[form_nama_sex]</span>
                            bernama <span data-out="namaBayi">[form_nama_bayi]</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">Dari seorang ibu:</p>

                <table class="data-table">
                    <tr>
                        <td class="no">6.</td>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaIbu">[form_nama_ibu]</td>
                    </tr>
                    <tr>
                        <td class="no">7.</td>
                        <td class="label">NIK / No KTP</td>
                        <td class="colon">:</td>
                        <td data-out="nikIbu">[nik_ibu]</td>
                    </tr>
                    <tr>
                        <td class="no">8.</td>
                        <td class="label">Umur</td>
                        <td class="colon">:</td>
                        <td><span data-out="umurIbu">[umur_ibu]</span> Tahun</td>
                    </tr>
                    <tr>
                        <td class="no">9.</td>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanIbu">[pekerjaanibu]</td>
                    </tr>
                    <tr>
                        <td class="no">10.</td>
                        <td class="label">Alamat/Tempat Tinggal</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="alamatIbu">[alamat_ibu]</span>
                            Desa <span data-out="desaIbu">[desaibu]</span>,
                            Kecamatan <span data-out="kecIbu">[kecibu]</span>,
                            Kabupaten <span data-out="kabIbu">[kabibu]</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">Istri dari:</p>

                <table class="data-table">
                    <tr>
                        <td class="no">11.</td>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaAyah">[form_nama_ayah]</td>
                    </tr>
                    <tr>
                        <td class="no">12.</td>
                        <td class="label">NIK / No KTP</td>
                        <td class="colon">:</td>
                        <td data-out="nikAyah">[nik_ayah]</td>
                    </tr>
                    <tr>
                        <td class="no">13.</td>
                        <td class="label">Umur</td>
                        <td class="colon">:</td>
                        <td><span data-out="umurAyah">[umur_ayah]</span> Tahun</td>
                    </tr>
                    <tr>
                        <td class="no">14.</td>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanAyah">[pekerjaanayah]</td>
                    </tr>
                    <tr>
                        <td class="no">15.</td>
                        <td class="label">Alamat</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="alamatAyah">[alamat_ayah]</span>
                            Desa <span data-out="desaAyah">[desaayah]</span>,
                            Kecamatan <span data-out="kecAyah">[kecayah]</span>,
                            Kabupaten <span data-out="kabAyah">[kabayah]</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">Surat keterangan ini dibuat berdasarkan keterangan pelapor:</p>

                <table class="data-table">
                    <tr>
                        <td class="no">16.</td>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaPelapor">[form_nama_pelapor]</td>
                    </tr>
                    <tr>
                        <td class="no">17.</td>
                        <td class="label">NIK</td>
                        <td class="colon">:</td>
                        <td data-out="nikPelapor">[form_nik_pelapor]</td>
                    </tr>
                    <tr>
                        <td class="no">18.</td>
                        <td class="label">Umur</td>
                        <td class="colon">:</td>
                        <td><span data-out="umurPelapor">[form_umur_pelapor]</span> Tahun</td>
                    </tr>
                    <tr>
                        <td class="no">19.</td>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanPelapor">[form_pekerjaanpelapor]</td>
                    </tr>
                    <tr>
                        <td class="no">20.</td>
                        <td class="label">Alamat</td>
                        <td class="colon">:</td>
                        <td>
                            Desa <span data-out="desaPelapor">[form_desapelapor]</span>,
                            Kecamatan <span data-out="kecPelapor">[form_kecpelapor]</span>,
                            Kabupaten <span data-out="kabPelapor">[form_kabpelapor]</span>,
                            Provinsi <span data-out="provPelapor">[form_provinsipelapor]</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="no">21.</td>
                        <td class="label">Hubungan pelapor dengan bayi</td>
                        <td class="colon">:</td>
                        <td data-out="hubunganPelapor">[form_hubungan_pelapor]</td>
                    </tr>
                </table>

                <p class="paragraf">
                    Demikian surat keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana mestinya.
                </p>

                <div class="ttd-right">
                    <div>
                        <span data-out="namaDesa">[nama_desa]</span>,
                        <span data-date="tanggalSurat">[tgl_surat]</span>
                    </div>
                    <div>Kepala Desa</div>
                    <div class="ttd-space"></div>
                    <div class="ttd-name" data-out="namaKepalaDesa">[………………………]</div>
                </div>
            </div>

            <div class="page">
                <div class="page-title-small">
                    <p>
                        Perihal : Permohonan Penyelesaian<br>
                        Akta Kelahiran
                    </p>

                    <p>
                        Kepada<br>
                        Yth, Kepala Dinas Kependudukan dan Pencatatan<br>
                        Sipil Kabupaten <span data-out="kabupatenSurat">[nama_kab]</span><br>
                        Di - <span data-out="lokasiDisdukcapil">[lokasi_disdukcapil]</span>
                    </p>
                </div>

                <p class="paragraf">Yang bertanda tangan di bawah ini :</p>

                <table class="data-table">
                    <tr>
                        <td class="label">NIK</td>
                        <td class="colon">:</td>
                        <td data-out="nikPelapor">[nik_pelapor]</td>
                    </tr>
                    <tr>
                        <td class="label">Nama lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaPelapor">[nama_pelapor]</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat tanggal lahir / umur</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="tempatLahirPelapor">[tempat_lahir_pelapor]</span>,
                            <span data-date="tanggalLahirPelapor">[tanggal_lahir_pelapor]</span> /
                            <span data-out="umurPelapor">[umur_pelapor]</span> Tahun
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanPelapor">[pekerjaanpelapor]</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat</td>
                        <td class="colon">:</td>
                        <td>
                            Desa <span data-out="desaPelapor">[form_desapelapor]</span>,
                            Kecamatan <span data-out="kecPelapor">[form_kecpelapor]</span>,
                            Kabupaten <span data-out="kabPelapor">[form_kabpelapor]</span>,
                            Provinsi <span data-out="provPelapor">[form_provinsipelapor]</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">
                    Mohon dicatatkan kelahiran dalam register Akta Kelahiran dan diterbitkan kutipan Akta Kelahiran :
                </p>

                <table class="akta-table">
                    <tr>
                        <th style="width: 7%;">No</th>
                        <th style="width: 24%;">Nama / Jenis Kelamin</th>
                        <th style="width: 18%;">Tempat Lahir</th>
                        <th style="width: 18%;">Tanggal Lahir</th>
                        <th style="width: 13%;">Anak Ke</th>
                        <th style="width: 20%;">No dan Tanggal Pendaftaran</th>
                    </tr>
                    <tr>
                        <td>1.</td>
                        <td>
                            <span data-out="namaBayi">[form_nama_bayi]</span> /
                            <span data-out="jenisKelaminBayi">[form_nama_sex]</span>
                        </td>
                        <td data-out="tempatLahir">[form_tempatlahir]</td>
                        <td data-date="tanggalLahir">[form_tanggallahir]</td>
                        <td data-out="anakKe">[form_kelahiran_anak_ke]</td>
                        <td data-out="noTanggalPendaftaran">&nbsp;</td>
                    </tr>
                </table>

                <p class="paragraf">Dari seorang Ibu:</p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaIbu">[form_nama_ibu]</td>
                    </tr>
                    <tr>
                        <td class="label">NIK / No KTP</td>
                        <td class="colon">:</td>
                        <td data-out="nikIbu">[nik_ibu]</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat dan tanggal lahir / Umur</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="tempatLahirIbu">[tempat_lahir_ibu]</span>,
                            <span data-date="tanggalLahirIbu">[tanggal_lahir_ibu]</span> /
                            <span data-out="umurIbu">[umur_ibu]</span>
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Kewarganegaraan</td>
                        <td class="colon">:</td>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanIbu">[pekerjaanibu]</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat/Tempat Tinggal</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="alamatIbu">[alamat_ibu]</span>
                            Desa <span data-out="desaIbu">[desaibu]</span>,
                            Kecamatan <span data-out="kecIbu">[kecibu]</span>,
                            Kabupaten <span data-out="kabIbu">[kabibu]</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">Istri dari :</p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaAyah">[form_nama_ayah]</td>
                    </tr>
                    <tr>
                        <td class="label">NIK / No KTP</td>
                        <td class="colon">:</td>
                        <td data-out="nikAyah">[nik_ayah]</td>
                    </tr>
                    <tr>
                        <td class="label">Umur</td>
                        <td class="colon">:</td>
                        <td data-out="umurAyah">[umur_ayah]</td>
                    </tr>
                    <tr>
                        <td class="label">Kewarganegaraan</td>
                        <td class="colon">:</td>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanAyah">[pekerjaanayah]</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat/Tempat Tinggal</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="alamatAyah">[alamat_ayah]</span>
                            Desa <span data-out="desaAyah">[desaayah]</span>,
                            Kecamatan <span data-out="kecAyah">[kecayah]</span>,
                            Kabupaten <span data-out="kabAyah">[kabayah]</span>
                        </td>
                    </tr>
                </table>
            </div>

            <div class="page">
                <p class="paragraf">Saksi 1 :</p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaSaksi1">[nama_saksi1]</td>
                    </tr>
                    <tr>
                        <td class="label">NIK / No KTP</td>
                        <td class="colon">:</td>
                        <td data-out="nikSaksi1">[nik_saksi1]</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat dan tanggal lahir / Umur</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="tempatLahirSaksi1">[tempat_lahir_saksi1]</span>,
                            <span data-date="tanggalLahirSaksi1">[tanggal_lahir_saksi1]</span> /
                            <span data-out="umurSaksi1">[umur_saksi1]</span> Tahun
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Kewarganegaraan</td>
                        <td class="colon">:</td>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanSaksi1">[pekerjaansaksi1]</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat/Tempat Tinggal</td>
                        <td class="colon">:</td>
                        <td data-out="alamatSaksi1">[alamat_saksi1]</td>
                    </tr>
                </table>

                <p class="paragraf">Saksi 2 :</p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama Lengkap</td>
                        <td class="colon">:</td>
                        <td data-out="namaSaksi2">[nama_saksi2]</td>
                    </tr>
                    <tr>
                        <td class="label">NIK / No KTP</td>
                        <td class="colon">:</td>
                        <td data-out="nikSaksi2">[nik_saksi2]</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat dan tanggal lahir / Umur</td>
                        <td class="colon">:</td>
                        <td>
                            <span data-out="tempatLahirSaksi2">[tempat_lahir_saksi2]</span>,
                            <span data-date="tanggalLahirSaksi2">[tanggal_lahir_saksi2]</span> /
                            <span data-out="umurSaksi2">[umur_saksi2]</span> Tahun
                        </td>
                    </tr>
                    <tr>
                        <td class="label">Kewarganegaraan</td>
                        <td class="colon">:</td>
                        <td>Indonesia</td>
                    </tr>
                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td data-out="pekerjaanSaksi2">[pekerjaansaksi2]</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat/Tempat Tinggal</td>
                        <td class="colon">:</td>
                        <td data-out="alamatSaksi2">[alamat_saksi2]</td>
                    </tr>
                </table>

                <p class="paragraf">Terlampir persyaratan sebagai berikut :</p>

                <ol class="lampiran-list">
                    <li>Surat keterangan kelahiran dari penolong atau dari Desa/Lurah</li>
                    <li>Fotocopy KTP dan kartu keluarga orang tua</li>
                    <li>Fotocopy Buku Nikah / akta perkawinan orang tua yang telah dilegalisir (bagi yang memiliki)</li>
                    <li>Fotocopy KTP 2 orang saksi yang masih berlaku</li>
                    <li>Fotocopy Ijazah / Raport (bagi yang memiliki)</li>
                </ol>

                <div class="verifikasi-pelapor-row">
                    <div class="verifikasi-box">
                        <table class="verifikasi-table">
                            <tr>
                                <td class="verifikasi-label" rowspan="2">Verifikasi</td>
                                <td class="verifikasi-role">Kasi</td>
                            </tr>
                            <tr>
                                <td class="verifikasi-role">Kabid</td>
                            </tr>
                        </table>
                    </div>

                    <div class="pelapor-box">
                        <div>Pelapor</div>
                        <div class="pelapor-name" data-out="namaPelapor">[form_nama_pelapor]</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function formatTanggalIndonesia(tanggal) {
            if (!tanggal) return "";

            const bulan = [
                "Januari", "Februari", "Maret", "April", "Mei", "Juni",
                "Juli", "Agustus", "September", "Oktober", "November", "Desember"
            ];

            const date = new Date(tanggal + "T00:00:00");
            const hari = String(date.getDate()).padStart(2, "0");
            const namaBulan = bulan[date.getMonth()];
            const tahun = date.getFullYear();

            return `${hari} ${namaBulan} ${tahun}`;
        }

        function getValue(id) {
            const el = document.getElementById(id);
            return el ? el.value.trim() : "";
        }

        function fillText(selector, value, fallback) {
            document.querySelectorAll(selector).forEach(el => {
                el.textContent = value || fallback || el.textContent;
            });
        }

        function updateSurat() {
            document.querySelectorAll("[data-out]").forEach(el => {
                const id = el.getAttribute("data-out");
                const value = getValue(id);
                const fallback = el.getAttribute("data-fallback") || el.textContent;
                el.textContent = value || fallback;
            });

            document.querySelectorAll("[data-date]").forEach(el => {
                const id = el.getAttribute("data-date");
                const value = formatTanggalIndonesia(getValue(id));
                const fallback = el.getAttribute("data-fallback") || el.textContent;
                el.textContent = value || fallback;
            });

            const waktu = getValue("waktuLahir");
            fillText('[data-out="waktuLahir"]', waktu ? `${waktu} WITA` : "[form_waktu_lahir]");
        }

        function downloadPDF() {
            updateSurat();
            window.print();
        }

        updateSurat();
    </script>
</body>

</html>