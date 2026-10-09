<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Pengantar Nikah</title>
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
        grid-template-columns: 410px 1fr;
        gap: 24px;
        align-items: start;
    }

    .panel {
        background: #fff;
        border-radius: 12px;
        padding: 20px;
        box-shadow: 0 6px 20px rgba(0,0,0,.08);
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
        min-height: 62px; 
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
        padding: 14mm 18mm 10mm;
        font-family: "Times New Roman", serif;
        font-size: 11pt;
        line-height: 1.2;
        color: #000;
        overflow: hidden;
    }

    .lampiran { 
        font-size: 10pt; 
        line-height: 1.15; 
        margin-bottom: 6px; 
    }

    .model { 
        text-align: right; 
        font-weight: bold; 
        margin-top: -14px; 
        margin-bottom: 6px;
    }

    .judul-surat {
        text-align: center;
        font-weight: bold;
        font-size: 13.5pt;
        margin: 10px 0 8px;
    }

    .center { 
        text-align: center; 
    }

    .paragraf { 
        margin: 0 0 5px; 
        text-align: justify; 
    }

    .top-table, 
    .data-table { 
        width: 100%; 
        border-collapse: collapse; 
        margin: 2px 0 5px; 
    }

    .top-table td, 
    .data-table td { 
        padding: 1px 0; 
        vertical-align: top; 
    }

    .label { 
        width: 245px; 
    }

    .label-small { 
        width: 185px; 
    }

    .no { 
        width: 28px; 
    }

    .colon { 
        width: 12px; 
        text-align: center; 
    }

    .section-title { 
        font-weight: bold; 
        margin: 6px 0 2px; 
    }

    .dots { 
        border-bottom: 1px dotted #000; 
        display: inline-block; 
        min-width: 240px; 
        min-height: 15px; 
    }

    .ttd-right { 
        width: 280px; 
        margin-left: auto; 
        margin-top: 10px; 
        text-align: center;
        page-break-inside: avoid;
        break-inside: avoid;
    }

    .ttd-space { 
        height: 36px; 
    }

    .ttd-name { 
        display: inline-block; 
        min-width: 220px; 
        border-bottom: 1px dotted #000; 
        min-height: 16px; 
    }

    .ttd-row { 
        display: grid; 
        grid-template-columns: 1fr 1fr; 
        gap: 70px; 
        margin-top: 12px; 
        text-align: center;
        page-break-inside: avoid;
        break-inside: avoid;
    }

    ol { 
        margin-top: 3px; 
        margin-bottom: 5px;
        padding-left: 22px; 
    }

    li { 
        margin-bottom: 1px; 
    }

    @media (max-width: 980px) {
        .container { 
            grid-template-columns: 1fr; 
        }

        .panel { 
            max-height: none; 
            overflow: visible; 
        }
    }

    @media print {
        @page { 
            size: A4 portrait; 
            margin: 0; 
        }

        html,
        body {
            margin: 0 !important;
            padding: 0 !important;
            background: white !important;
            overflow: visible !important;
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
            width: 210mm;
            padding: 0;
            margin: 0;
            background: white;
            overflow: visible;
        }

        .surat-wrapper {
            width: 210mm;
            padding: 0 !important;
            margin: 0 !important;
            background: white !important;
            overflow: visible !important;
        }

        .page {
            display: block !important;
            width: 210mm !important;
            min-height: 0 !important;
            height: auto !important;
            margin: 0 !important;
            padding: 14mm 18mm 10mm !important;
            background: white !important;
            overflow: hidden !important;
            page-break-after: always !important;
            break-after: page !important;
        }

        .page:last-child { 
            page-break-after: auto !important; 
            break-after: auto !important; 
        }

        .ttd-right,
        .ttd-row {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }
    }
</style>
</head>
<body>
    <div class="container">
        <div class="panel">
            <h2>Form Surat Pengantar Nikah</h2>

            <h3>Data Kantor</h3>
            <div class="form-group"><label>Kantor Desa/Kelurahan</label><input id="kantorDesa" placeholder="Nama desa/kelurahan" /></div>
            <div class="form-row">
                <div class="form-group"><label>Kecamatan</label><input id="kecamatan" /></div>
                <div class="form-group"><label>Kabupaten/Kota</label><input id="kabupaten" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Nomor Pengantar</label><input id="nomorPengantar" /></div>
                <div class="form-group"><label>Tanggal Surat</label><input type="date" id="tanggalSurat" /></div>
            </div>
            <div class="form-group"><label>Tempat Surat</label><input id="tempatSurat" /></div>
            <div class="form-group"><label>Nama Kepala Desa/Lurah</label><input id="kepalaDesa" /></div>

            <h3>Calon Mempelai / Pemohon</h3>
            <div class="form-group"><label>Nama Lengkap</label><input id="nama" /></div>
            <div class="form-row">
                <div class="form-group"><label>NIK</label><input id="nik" /></div>
                <div class="form-group"><label>Jenis Kelamin</label><select id="jenisKelamin"><option>Laki-laki</option><option>Perempuan</option></select></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Tempat Lahir</label><input id="tempatLahir" /></div>
                <div class="form-group"><label>Tanggal Lahir</label><input type="date" id="tanggalLahir" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Kewarganegaraan</label><input id="kewarganegaraan" value="Indonesia" /></div>
                <div class="form-group"><label>Agama</label><input id="agama" value="Islam" /></div>
            </div>
            <div class="form-group"><label>Pekerjaan</label><input id="pekerjaan" /></div>
            <div class="form-group"><label>Alamat</label><textarea id="alamat"></textarea></div>
            <div class="form-row">
                <div class="form-group"><label>Status Laki-laki</label><input id="statusLaki" placeholder="Jejaka / Duda / Beristri ke ..." /></div>
                <div class="form-group"><label>Status Perempuan</label><input id="statusPerempuan" placeholder="Perawan / Janda" /></div>
            </div>

            <h3>Data Ayah</h3>
            <div class="form-group"><label>Nama Ayah</label><input id="namaAyah" /></div>
            <div class="form-group"><label>NIK Ayah</label><input id="nikAyah" /></div>
            <div class="form-row">
                <div class="form-group"><label>Tempat Lahir Ayah</label><input id="tempatLahirAyah" /></div>
                <div class="form-group"><label>Tanggal Lahir Ayah</label><input type="date" id="tanggalLahirAyah" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Kewarganegaraan Ayah</label><input id="kewarganegaraanAyah" value="Indonesia" /></div>
                <div class="form-group"><label>Agama Ayah</label><input id="agamaAyah" value="Islam" /></div>
            </div>
            <div class="form-group"><label>Pekerjaan Ayah</label><input id="pekerjaanAyah" /></div>
            <div class="form-group"><label>Alamat Ayah</label><textarea id="alamatAyah"></textarea></div>

            <h3>Data Ibu</h3>
            <div class="form-group"><label>Nama Ibu</label><input id="namaIbu" /></div>
            <div class="form-group"><label>NIK Ibu</label><input id="nikIbu" /></div>
            <div class="form-row">
                <div class="form-group"><label>Tempat Lahir Ibu</label><input id="tempatLahirIbu" /></div>
                <div class="form-group"><label>Tanggal Lahir Ibu</label><input type="date" id="tanggalLahirIbu" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Kewarganegaraan Ibu</label><input id="kewarganegaraanIbu" value="Indonesia" /></div>
                <div class="form-group"><label>Agama Ibu</label><input id="agamaIbu" value="Islam" /></div>
            </div>
            <div class="form-group"><label>Pekerjaan Ibu</label><input id="pekerjaanIbu" /></div>
            <div class="form-group"><label>Alamat Ibu</label><textarea id="alamatIbu"></textarea></div>

            <h3>Data Pasangan</h3>
            <div class="form-row">
                <div class="form-group"><label>Calon Suami</label><input id="calonSuami" /></div>
                <div class="form-group"><label>Calon Istri</label><input id="calonIstri" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Bin Calon Suami</label><input id="binSuami" /></div>
                <div class="form-group"><label>Binti Calon Istri</label><input id="bintiIstri" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>NIK Calon Suami</label><input id="nikSuami" /></div>
                <div class="form-group"><label>NIK Calon Istri</label><input id="nikIstri" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Tempat/Tgl Lahir Suami</label><input id="ttlSuami" /></div>
                <div class="form-group"><label>Tempat/Tgl Lahir Istri</label><input id="ttlIstri" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Pekerjaan Suami</label><input id="pekerjaanSuami" /></div>
                <div class="form-group"><label>Pekerjaan Istri</label><input id="pekerjaanIstri" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Alamat Suami</label><textarea id="alamatSuami"></textarea></div>
                <div class="form-group"><label>Alamat Istri</label><textarea id="alamatIstri"></textarea></div>
            </div>

            <h3>Permohonan Nikah / Itsbat</h3>
            <div class="form-row">
                <div class="form-group"><label>Tujuan KUA Kecamatan</label><input id="kuaKecamatan" /></div>
                <div class="form-group"><label>Lokasi KUA</label><input id="lokasiKua" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Tanggal Diterima</label><input type="date" id="tanggalDiterima" /></div>
                <div class="form-group"><label>Nama Pemohon</label><input id="namaPemohon" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Tanggal Penetapan Itsbat</label><input id="tanggalPenetapan" /></div>
                <div class="form-group"><label>Pengadilan Agama</label><input id="pengadilanAgama" /></div>
            </div>

            <h3>Surat Izin Orang Tua / Kematian</h3>
            <div class="form-group"><label>Nama Anak yang Diberi Izin</label><input id="anakIzin" /></div>
            <div class="form-group"><label>Pasangan Anak</label><input id="pasanganAnak" /></div>
            <div class="form-row">
                <div class="form-group"><label>Nama Almarhum/Almarhumah</label><input id="namaMeninggal" /></div>
                <div class="form-group"><label>Bin/Binti Almarhum</label><input id="binMeninggal" /></div>
            </div>
            <div class="form-row">
                <div class="form-group"><label>Tanggal Meninggal</label><input type="date" id="tanggalMeninggal" /></div>
                <div class="form-group"><label>Tempat Meninggal</label><input id="tempatMeninggal" /></div>
            </div>
            <div class="form-group"><label>Suami/Istri dari</label><input id="pasanganMeninggal" /></div>

            <div class="btn-group">
                <button class="btn-preview" onclick="updateSurat()">Lihat Hasil</button>
                <button class="btn-download" onclick="downloadPDF()">Download PDF</button>
            </div>
        </div>

        <div class="surat-wrapper" id="areaSurat">
            <div class="page">
                <div class="lampiran">Lampiran V<br>Keputusan Dirjen Bimas Islam No. 473 Tahun 2020<br>FORMULIR PENGANTAR NIKAH</div>
                <div class="model">Model N1</div>
                <table class="top-table">
                    <tr><td class="label-small">KANTOR DESA/KELURAHAN</td><td class="colon">:</td><td data-out="kantorDesa">.........................................................................</td></tr>
                    <tr><td>KECAMATAN</td><td class="colon">:</td><td data-out="kecamatan">.........................................................................</td></tr>
                    <tr><td>KABUPATEN/KOTA</td><td class="colon">:</td><td data-out="kabupaten">.........................................................................</td></tr>
                </table>
                <div class="judul-surat">PENGANTAR NIKAH</div>
                <div class="center">Nomor : <span data-out="nomorPengantar">............................................................................</span></div>
                <p class="paragraf">Yang bertada tangan di bawah ini menjelaskan dengan sesungguhnya bahwa :</p>
                <table class="data-table">
                    <tr><td class="no">1.</td><td class="label">Nama</td><td class="colon">:</td><td data-out="nama">.....................................................................</td></tr>
                    <tr><td class="no">2.</td><td class="label">Nomor Induk Kependudukan (NIK)</td><td class="colon">:</td><td data-out="nik">.....................................................................</td></tr>
                    <tr><td class="no">3.</td><td class="label">Jenis Kelamin</td><td class="colon">:</td><td data-out="jenisKelamin">.....................................................................</td></tr>
                    <tr><td class="no">4.</td><td class="label">Tempat dan Tanggal Lahir</td><td class="colon">:</td><td><span data-out="tempatLahir">.....................................................................</span>, <span data-date="tanggalLahir"></span></td></tr>
                    <tr><td class="no">5.</td><td class="label">Kewarganegaraan</td><td class="colon">:</td><td data-out="kewarganegaraan">.....................................................................</td></tr>
                    <tr><td class="no">6.</td><td class="label">Agama</td><td class="colon">:</td><td data-out="agama">.....................................................................</td></tr>
                    <tr><td class="no">7.</td><td class="label">Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaan">.....................................................................</td></tr>
                    <tr><td class="no">8.</td><td class="label">Alamat</td><td class="colon">:</td><td data-out="alamat">.....................................................................</td></tr>
                    <tr><td class="no">9.</td><td class="label">Status Perkawinan</td><td class="colon">:</td><td></td></tr>
                    <tr><td></td><td>a. Laki-laki: jejaka, duda, atau beristri ke</td><td class="colon">:</td><td data-out="statusLaki">.....................................................................</td></tr>
                    <tr><td></td><td>b. Perempuan: Perawan, Janda</td><td class="colon">:</td><td data-out="statusPerempuan">.....................................................................</td></tr>
                </table>

                <p class="paragraf">Adalah benar, anak dari perkawinan seorang pria :</p>
                <table class="data-table">
                    <tr><td class="label">Nama Lengkap dan alias</td><td class="colon">:</td><td data-out="namaAyah">.....................................................................</td></tr>
                    <tr><td>Nomor Induk Kependudukan (NIK)</td><td class="colon">:</td><td data-out="nikAyah">.....................................................................</td></tr>
                    <tr><td>Tempat dan Tanggal Lahir</td><td class="colon">:</td><td><span data-out="tempatLahirAyah">.....................................................................</span>, <span data-date="tanggalLahirAyah"></span></td></tr>
                    <tr><td>Kewarganegaraan</td><td class="colon">:</td><td data-out="kewarganegaraanAyah">.....................................................................</td></tr>
                    <tr><td>Agama</td><td class="colon">:</td><td data-out="agamaAyah">.....................................................................</td></tr>
                    <tr><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaanAyah">.....................................................................</td></tr>
                    <tr><td>Alamat</td><td class="colon">:</td><td data-out="alamatAyah">.....................................................................</td></tr>
                </table>
                <p class="paragraf">dengan seorang Wanita :</p>
                <table class="data-table">
                    <tr><td class="label">Nama Lengkap dan alias</td><td class="colon">:</td><td data-out="namaIbu">.....................................................................</td></tr>
                    <tr><td>Nomor Induk Kependudukan (NIK)</td><td class="colon">:</td><td data-out="nikIbu">.....................................................................</td></tr>
                    <tr><td>Tempat dan Tanggal Lahir</td><td class="colon">:</td><td><span data-out="tempatLahirIbu">.....................................................................</span>, <span data-date="tanggalLahirIbu"></span></td></tr>
                    <tr><td>Kewarganegaraan</td><td class="colon">:</td><td data-out="kewarganegaraanIbu">.....................................................................</td></tr>
                    <tr><td>Agama</td><td class="colon">:</td><td data-out="agamaIbu">.....................................................................</td></tr>
                    <tr><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaanIbu">.....................................................................</td></tr>
                    <tr><td>Alamat</td><td class="colon">:</td><td data-out="alamatIbu">.....................................................................</td></tr>
                </table>
                <p class="paragraf">Demikian, surat pengantar ini dibuat dengan mengingat sumpah jabatan dan untuk dipergunakan sebagaimana mestinya.</p>
                <div class="ttd-right"><div><span data-out="tempatSurat">...........................</span>, <span data-date="tanggalSurat">..........................20............</span></div><div>Kepala Desa / Lurah</div><div class="ttd-space"></div><div class="ttd-name" data-out="kepalaDesa">.................................................................*</div><div style="text-align:left;margin-top:8px;">*) nama terang</div></div>
            </div>

            <div class="page">
                <div class="lampiran">Lampiran VI<br>Keputusan Direktur Jenderal Bimbingan Masyarakat Islam Nomor 473 Tahun 2020<br>FORMULIR PERMOHONAN KEHENDAK NIKAH</div>
                <div class="model">Model N2</div>
                <p>Perihal : Permohonan kehendak perkawinan <span data-out="tempatSurat">..................</span>, <span data-date="tanggalSurat">............................</span></p>
                <p>Kepada yth.<br>Kepala KUA Kecamatan /PPN LN<br>di <span data-out="lokasiKua">...............................</span></p>
                <p class="paragraf">Dengan hormat, kami mengajukan permohonan kehendak NIKAH untuk atas nama :</p>
                <table class="data-table">
                    <tr><td class="label-small">Calon suami</td><td class="colon">:</td><td data-out="calonSuami">...........................................................................................</td></tr>
                    <tr><td>Calon Istri</td><td class="colon">:</td><td data-out="calonIstri">...........................................................................................</td></tr>
                </table>
                <p>Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut :</p>
                <ol><li>Surat pengantar perkawinan dari Desa / Kelurahan</li><li>Persetujuan calon mempelai</li><li>Fotokopi KTP</li><li>Fotokopi akte kelahiran</li><li>Fotokopi kartu keluarga</li><li>Paspoto 2x3=3 lembar, 4x6=1 lembar berlatar belakang biru</li><li>................................................................................................</li><li>................................................................................................</li><li>................................................................................................</li><li>...............................................................................................</li></ol>
                <p class="paragraf">Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri dan dicatat sesuai dengan ketentuan peraturan perundang-undangan.</p>
                <p>Wassalam</p>
                <div class="ttd-row"><div><div>Diterima tanggal <span data-date="tanggalDiterima">............................................</span></div><div>Yang menerima<br>Kepala KUA/PPN LN</div><div class="ttd-space"></div><div class="ttd-name"></div></div><div><div>Pemohon</div><div class="ttd-space"></div><div class="ttd-name" data-out="namaPemohon">.............................................</div></div></div>
            </div>

            <div class="page">
                <div class="lampiran">Lampiran VII<br>Keputusan Dirjen Bimas Islam No. 473 Tahun 2020<br>FORMULIR PERMOHONAN PENCATATAN ITSBAT NIKAH</div>
                <div class="model">Model N3</div>
                <p>Perihal : Permohonan Pencatatan Itsbat <span data-out="tempatSurat">.......................</span>, <span data-date="tanggalSurat">............. 20</span></p>
                <p>Kepada Yth,<br>Kepala KUA Kecamatan / PPN LN <span data-out="kuaKecamatan">..............................</span><br>di. <span data-out="lokasiKua">......................................................</span></p>
                <p class="paragraf">Dengan hormat, kami mengajukan permohonan pencatatan itsbat untuk atas nama :</p>
                <table class="data-table">
                    <tr><td class="label-small">Suami</td><td class="colon">:</td><td data-out="calonSuami">....................................................................................</td></tr>
                    <tr><td>Istri</td><td class="colon">:</td><td data-out="calonIstri">....................................................................................</td></tr>
                    <tr><td>Tanggal Penetapan</td><td class="colon">:</td><td data-out="tanggalPenetapan">....................................................................................</td></tr>
                    <tr><td>Pengadilan Agama</td><td class="colon">:</td><td data-out="pengadilanAgama">....................................................................................</td></tr>
                </table>
                <p>Bersama ini kami sampaikan surat-surat yang diperlukan untuk diperiksa sebagai berikut :</p>
                <ol><li>Putusan Itsbat</li><li>Fotokopi KTP</li><li>Fotokopi Kartu keluarga</li><li>Paspoto 2x3=3 lembar berlatar belakang biru</li><li>.........................................................</li><li>........................................................</li></ol>
                <p class="paragraf">Demikian permohonan ini kami sampaikan, kiranya dapat diperiksa, dihadiri dan dicatat sesuai dengan ketentuan peraturan perundang-undangan.</p>
                <p>Wassalam</p>
                <div class="ttd-row"><div><div>Diterima tanggal <span data-date="tanggalDiterima">...................</span></div><div>Yang Menerima<br>Kepala KUA/PPN LN</div><div class="ttd-space"></div><div class="ttd-name"></div></div><div><div>Pemohon</div><div class="ttd-space"></div><div class="ttd-name" data-out="namaPemohon">................................................</div></div></div>
            </div>

            <div class="page">
                <div class="lampiran">Lampiran VIII<br>Keputusan Dirjen Bimas Islam No. 473 Tahun 2020<br>FORMULIR SURAT PERSETUJUAN MEMPELAI</div>
                <div class="model">Model N4</div>
                <div class="judul-surat">SURAT PERSETUJUAN MEMPELAI</div>
                <p>Yang bertanda tangan di bawah ini :</p>
                <div class="section-title">A. Calon suami :</div>
                <table class="data-table">
                    <tr><td class="no">1.</td><td class="label">Nama Lengkap dan Alias</td><td class="colon">:</td><td data-out="calonSuami">.........................................................................................</td></tr>
                    <tr><td>2.</td><td>Bin</td><td class="colon">:</td><td data-out="binSuami">.........................................................................................</td></tr>
                    <tr><td>3.</td><td>Nomor Induk Kependudukan (NIK)</td><td class="colon">:</td><td data-out="nikSuami">.........................................................................................</td></tr>
                    <tr><td>4.</td><td>Tempat dan tanggal lahir</td><td class="colon">:</td><td data-out="ttlSuami">.........................................................................................</td></tr>
                    <tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td>Indonesia</td></tr>
                    <tr><td>6.</td><td>Agama</td><td class="colon">:</td><td>Islam</td></tr>
                    <tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaanSuami">.........................................................................................</td></tr>
                    <tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td data-out="alamatSuami">.........................................................................................</td></tr>
                </table>
                <div class="section-title">B. Calon Istri :</div>
                <table class="data-table">
                    <tr><td class="no">1.</td><td class="label">Nama Lengkap dan Alias</td><td class="colon">:</td><td data-out="calonIstri">.........................................................................................</td></tr>
                    <tr><td>2.</td><td>Binti</td><td class="colon">:</td><td data-out="bintiIstri">.........................................................................................</td></tr>
                    <tr><td>3.</td><td>Nomor Induk Kependudukan (NIK)</td><td class="colon">:</td><td data-out="nikIstri">.........................................................................................</td></tr>
                    <tr><td>4.</td><td>Tempat dan tanggal lahir</td><td class="colon">:</td><td data-out="ttlIstri">.........................................................................................</td></tr>
                    <tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td>Indonesia</td></tr>
                    <tr><td>6.</td><td>Agama</td><td class="colon">:</td><td>Islam</td></tr>
                    <tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaanIstri">.........................................................................................</td></tr>
                    <tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td data-out="alamatIstri">.........................................................................................</td></tr>
                </table>
                <p class="paragraf">Menyatakan dengan sesungguhnya bahwa atas dasar suka rela, dengan kesadaran sendiri, tanpa ada paksaan dari siapapun juga, setuju untuk melangsungkan perkawinan.</p>
                <p class="paragraf">Demikian surat persetujuan ini di buat untuk digunakan seperlunya.</p>
                <div class="ttd-right"><div><span data-out="tempatSurat">.................................</span>, <span data-date="tanggalSurat">..............................20.............</span></div></div>
                <div class="ttd-row"><div><div>Calon Suami</div><div class="ttd-space"></div><div class="ttd-name" data-out="calonSuami">..................................................</div></div><div><div>Calon Istri</div><div class="ttd-space"></div><div class="ttd-name" data-out="calonIstri">.................................................</div></div></div>
            </div>

            <div class="page">
                <div class="lampiran">Lampiran IX<br>Keputusan Dirjen Bimas Islam No. 473 Tahun 2020<br>FORMULIR SURAT IZIN ORANG TUA</div>
                <div class="model">Model N5</div>
                <div class="judul-surat">SURAT IZIN ORANG TUA</div>
                <p>Yang bertanda tangan di bawah ini :</p>
                <div class="section-title">A. Ayah/Wali/Pengampu</div>
                <table class="data-table"><tr><td class="no">1.</td><td class="label">Nama Lengkap dan Alias</td><td class="colon">:</td><td data-out="namaAyah">.........................................................................................</td></tr><tr><td>2.</td><td>Bin</td><td class="colon">:</td><td></td></tr><tr><td>3.</td><td>NIK</td><td class="colon">:</td><td data-out="nikAyah">.........................................................................................</td></tr><tr><td>4.</td><td>Tempat dan tanggal lahir</td><td class="colon">:</td><td><span data-out="tempatLahirAyah"></span>, <span data-date="tanggalLahirAyah"></span></td></tr><tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td data-out="kewarganegaraanAyah">.........................................................................................</td></tr><tr><td>6.</td><td>Agama</td><td class="colon">:</td><td data-out="agamaAyah">.........................................................................................</td></tr><tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaanAyah">.........................................................................................</td></tr><tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td data-out="alamatAyah">.........................................................................................</td></tr></table>
                <div class="section-title">B. Ibu/Wali/Pengampu</div>
                <table class="data-table"><tr><td class="no">1.</td><td class="label">Nama Lengkap dan Alias</td><td class="colon">:</td><td data-out="namaIbu">.........................................................................................</td></tr><tr><td>2.</td><td>Binti</td><td class="colon">:</td><td></td></tr><tr><td>3.</td><td>NIK</td><td class="colon">:</td><td data-out="nikIbu">.........................................................................................</td></tr><tr><td>4.</td><td>Tempat dan tanggal lahir</td><td class="colon">:</td><td><span data-out="tempatLahirIbu"></span>, <span data-date="tanggalLahirIbu"></span></td></tr><tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td data-out="kewarganegaraanIbu">.........................................................................................</td></tr><tr><td>6.</td><td>Agama</td><td class="colon">:</td><td data-out="agamaIbu">.........................................................................................</td></tr><tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaanIbu">.........................................................................................</td></tr><tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td data-out="alamatIbu">.........................................................................................</td></tr></table>
                <p>Memberikan izin kepada anak kami untuk melakukan pernikahan dengan :</p>
                <table class="data-table"><tr><td class="no">1.</td><td class="label">Nama Lengkap dan Alias</td><td class="colon">:</td><td data-out="pasanganAnak">.........................................................................................</td></tr><tr><td>2.</td><td>Bin / binti</td><td class="colon">:</td><td></td></tr><tr><td>3.</td><td>NIK</td><td class="colon">:</td><td></td></tr><tr><td>4.</td><td>Tempat dan tanggal lahir</td><td class="colon">:</td><td></td></tr><tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td></td></tr><tr><td>6.</td><td>Agama</td><td class="colon">:</td><td></td></tr><tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td></td></tr><tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td></td></tr></table>
                <p class="paragraf">Demikian surat izin ini di buat dengan kesadaran penuh tanpa ada paksaan dari siapapun dan untuk digunakan seperlunya.</p>
                <div class="ttd-right"><div><span data-out="tempatSurat">.................................</span>, <span data-date="tanggalSurat">...........................20.......</span></div></div>
                <div class="ttd-row"><div><div>Ayah/wali/pengampu</div><div class="ttd-space"></div><div class="ttd-name" data-out="namaAyah">..............................................</div></div><div><div>Ibu/wali/pengampu</div><div class="ttd-space"></div><div class="ttd-name" data-out="namaIbu">............................................................</div></div></div>
            </div>

            <div class="page">
                <div class="lampiran">Lampiran X<br>Keputusan Dirjen Bimas Islam No. 473 Tahun 2020<br>FORMULIR SURAT KETERANGAN KEMATIAN</div>
                <div class="model">Model N6</div>
                <table class="top-table"><tr><td class="label-small">KANTOR DESA/KELURAHAN</td><td class="colon">:</td><td data-out="kantorDesa">.........................................................................</td></tr><tr><td>KECAMATAN</td><td class="colon">:</td><td data-out="kecamatan">.........................................................................</td></tr><tr><td>KABUPATEN/KOTA</td><td class="colon">:</td><td data-out="kabupaten">.........................................................................</td></tr></table>
                <div class="judul-surat">SURAT KETERANGAN KEMATIAN</div>
                <div class="center">Nomor : <span data-out="nomorPengantar">....................................................</span></div>
                <p>Yang bertanda tangan di bawah ini menjelaskan dengan sesungguhnya bahwa :</p>
                <div class="section-title">A.</div>
                <table class="data-table"><tr><td class="no">1.</td><td class="label">Nama</td><td class="colon">:</td><td data-out="namaMeninggal">.......................................................................</td></tr><tr><td>2.</td><td>Bin / Binti</td><td class="colon">:</td><td data-out="binMeninggal">.......................................................................</td></tr><tr><td>3.</td><td>NIK</td><td class="colon">:</td><td data-out="nik">.......................................................................</td></tr><tr><td>4.</td><td>Tempat dan Tanggal Lahir</td><td class="colon">:</td><td><span data-out="tempatLahir"></span>, <span data-date="tanggalLahir"></span></td></tr><tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td data-out="kewarganegaraan">.......................................................................</td></tr><tr><td>6.</td><td>Agama</td><td class="colon">:</td><td data-out="agama">.......................................................................</td></tr><tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td data-out="pekerjaan">.......................................................................</td></tr><tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td data-out="alamat">.......................................................................</td></tr></table>
                <p>telah meninggal dunia pada tanggal : <span data-date="tanggalMeninggal">.......................................................................</span><br>di : <span data-out="tempatMeninggal">.......................................................................</span></p>
                <p>Yang bersangkutan adalah suami / istri*) dari :</p>
                <div class="section-title">B.</div>
                <table class="data-table"><tr><td class="no">1.</td><td class="label">Nama</td><td class="colon">:</td><td data-out="pasanganMeninggal">.......................................................................</td></tr><tr><td>2.</td><td>Bin / Binti</td><td class="colon">:</td><td></td></tr><tr><td>3.</td><td>NIK</td><td class="colon">:</td><td></td></tr><tr><td>4.</td><td>Tempat dan Tanggal Lahir</td><td class="colon">:</td><td></td></tr><tr><td>5.</td><td>Kewarganegaraan</td><td class="colon">:</td><td></td></tr><tr><td>6.</td><td>Agama</td><td class="colon">:</td><td></td></tr><tr><td>7.</td><td>Pekerjaan</td><td class="colon">:</td><td></td></tr><tr><td>8.</td><td>Alamat</td><td class="colon">:</td><td></td></tr></table>
                <p class="paragraf">Demikian, surat keterangan ini dibuat dengan mengingat sumpah jabatan dan untuk digunakan seperlunya.</p>
                <div class="ttd-right"><div><span data-out="tempatSurat">...........................</span>, <span data-date="tanggalSurat">..........................20............</span></div><div>Kepala Desa / Lurah</div><div class="ttd-space"></div><div class="ttd-name" data-out="kepalaDesa">................................................................. **)</div><div style="text-align:left;margin-top:8px;">*) coret yang tidak perlu<br>**) nama lengkap</div></div>
            </div>
        </div>
    </div>

    <script>
        function formatTanggalIndonesia(tanggal) {
            if (!tanggal) return "";
            const bulan = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
            const date = new Date(tanggal + "T00:00:00");
            return `${String(date.getDate()).padStart(2, "0")} ${bulan[date.getMonth()]} ${date.getFullYear()}`;
        }

        function getValue(id) {
            const el = document.getElementById(id);
            return el ? el.value.trim() : "";
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
        }

        function downloadPDF() {
            updateSurat();
            window.print();
        }

        updateSurat();
    </script>
</body>
</html>