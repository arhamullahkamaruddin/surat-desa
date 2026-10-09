<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Pengantar SKCK</title>

    <style>
        * {
            box-sizing: border-box;
        }

        html,
        body {
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: #f2f4f8;
            color: #222;
        }

        .container {
            max-width: 1250px;
            margin: 30px auto;
            padding: 0 20px;
            display: grid;
            grid-template-columns: 380px 1fr;
            gap: 24px;
        }

        .panel {
            background: #fff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0,0,0,.08);
        }

        .panel h2 {
            margin: 0 0 14px;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 13px;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
        }

        label {
            display: block;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 6px;
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
            min-height: 70px;
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

        .surat {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: #fff;
            padding: 18mm 20mm 12mm;
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.35;
            color: #000;
        }

        .kop {
            text-align: center;
            border-bottom: 2px solid #000;
            padding-bottom: 7px;
            margin-bottom: 14px;
        }

        .kop h2,
        .kop h3,
        .kop p {
            margin: 0;
        }

        .kop h2 {
            font-size: 15.5pt;
            font-weight: bold;
        }

        .kop h3 {
            font-size: 13.5pt;
            font-weight: bold;
        }

        .kop p {
            font-size: 10.5pt;
            margin-top: 3px;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 13.5pt;
            line-height: 1.25;
            margin-top: 14px;
        }

        .nomor-surat {
            text-align: center;
            margin-bottom: 22px;
        }

        .paragraf {
            margin: 0 0 9px;
            text-align: justify;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 5px 0 13px;
        }

        .data-table td {
            padding: 2px 0;
            vertical-align: top;
        }

        .label {
            width: 185px;
        }

        .colon {
            width: 14px;
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
            min-height: 18px;
            border-bottom: 1px dotted #000;
            padding-bottom: 2px;
        }

        @media (max-width: 950px) {
            .container {
                grid-template-columns: 1fr;
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

            .panel {
                display: none !important;
            }

            .container {
                display: block !important;
                width: auto !important;
                max-width: none !important;
                margin: 0 !important;
                padding: 0 !important;
            }

            .surat-wrapper {
                display: block !important;
                width: auto !important;
                margin: 0 !important;
                padding: 0 !important;
                background: white !important;
                overflow: visible !important;
            }

            .surat {
                display: block !important;
                width: 210mm !important;
                min-height: 0 !important;
                height: auto !important;
                margin: 0 !important;
                padding: 18mm 20mm 12mm !important;
                background: white !important;
                overflow: visible !important;
                page-break-after: auto !important;
                break-after: auto !important;
            }

            .ttd-area {
                page-break-inside: avoid;
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel">
            <h2>Form Surat Pengantar SKCK</h2>

            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" id="nomorSurat" placeholder="Contoh: 470/001/DS/2026" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Desa</label>
                    <input type="text" id="desa" value="Laliko" />
                </div>

                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" id="kecamatan" value="Campalagian" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kabupaten</label>
                    <input type="text" id="kabupaten" value="Polewali Mandar" />
                </div>

                <div class="form-group">
                    <label>Provinsi</label>
                    <input type="text" id="provinsi" value="Sulawesi Barat" />
                </div>
            </div>

            <div class="form-group">
                <label>Kode Pos</label>
                <input type="text" id="kodePos" value="91357" />
            </div>

            <hr>

            <div class="form-group">
                <label>Nama</label>
                <input type="text" id="nama" placeholder="Nama lengkap" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Lahir</label>
                    <input type="text" id="tempatLahir" placeholder="Tempat lahir" />
                </div>

                <div class="form-group">
                    <label>Tanggal Lahir</label>
                    <input type="date" id="tanggalLahir" />
                </div>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Jenis Kelamin</label>
                    <select id="jenisKelamin">
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Kebangsaan</label>
                    <input type="text" id="kebangsaan" value="Indonesia" />
                </div>
            </div>

            <div class="form-group">
                <label>Pekerjaan</label>
                <input type="text" id="pekerjaan" placeholder="Pekerjaan" />
            </div>

            <div class="form-group">
                <label>Status Perkawinan</label>
                <input type="text" id="statusPerkawinan" placeholder="Belum Kawin / Kawin / Cerai Hidup / Cerai Mati" />
            </div>

            <div class="form-group">
                <label>Agama</label>
                <input type="text" id="agama" value="Islam" />
            </div>

            <div class="form-group">
                <label>No NIK</label>
                <input type="text" id="nik" placeholder="Nomor Induk Kependudukan" />
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea id="alamat" placeholder="Alamat lengkap"></textarea>
            </div>

            <div class="form-group">
                <label>Keperluan</label>
                <textarea id="keperluan" placeholder="Contoh: Pengurusan SKCK di Kepolisian"></textarea>
            </div>

            <hr>

            <div class="form-row">
                <div class="form-group">
                    <label>Tempat Surat</label>
                    <input type="text" id="tempatSurat" value="Laliko" />
                </div>

                <div class="form-group">
                    <label>Tanggal Surat</label>
                    <input type="date" id="tanggalSurat" />
                </div>
            </div>

            <div class="form-group">
                <label>Nama Kepala Desa</label>
                <input type="text" id="kepalaDesa" placeholder="Nama Kepala Desa" />
            </div>

            <div class="btn-group">
                <button class="btn-preview" onclick="updateSurat()">Lihat Hasil</button>
                <button class="btn-download" onclick="downloadPDF()">Download PDF</button>
            </div>
        </div>

        <div class="surat-wrapper" id="areaSurat">
            <div class="surat">
                <div class="kop">
                    <h2>PEMERINTAH DESA <span id="pDesaKop">LALIKO</span></h2>
                    <h3>KECAMATAN <span id="pKecamatanKop">CAMPALAGIAN</span> KABUPATEN</h3>
                    <h3><span id="pKabupatenKop">POLEWALI MANDAR</span></h3>
                    <p>
                        Desa <span id="pDesaAlamat">Laliko</span>,
                        Kecamatan <span id="pKecamatanAlamat">Campalagian</span>,
                        Kabupaten <span id="pKabupatenAlamat">Polewali Mandar</span>
                        Provinsi <span id="pProvinsiAlamat">Sulawesi Barat</span>,
                        <span id="pKodePos">91357</span>
                    </p>
                </div>

                <div class="judul-surat">SURAT PENGANTAR KETERANGAN BERKELAKUAN BAIK</div>

                <div class="nomor-surat">
                    Nomor : <span id="pNomorSurat">/ /2026</span>
                </div>

                <p class="paragraf">
                    Yang bertanda tangan dibawah ini Kepala Desa
                    <span id="pDesaIsi">Laliko</span>, Kecamatan
                    <span id="pKecamatanIsi">Campalagian</span>
                    Kabupaten <span id="pKabupatenIsi">Polewali Mandar</span>,
                    dengan ini menerangkan bahwa :
                </p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama</td>
                        <td class="colon">:</td>
                        <td id="pNama"></td>
                    </tr>

                    <tr>
                        <td class="label">Tempat Tanggal Lahir</td>
                        <td class="colon">:</td>
                        <td id="pTempatTanggalLahir"></td>
                    </tr>

                    <tr>
                        <td class="label">Jenis Kelamin</td>
                        <td class="colon">:</td>
                        <td id="pJenisKelamin"></td>
                    </tr>

                    <tr>
                        <td class="label">Kebangsaan</td>
                        <td class="colon">:</td>
                        <td id="pKebangsaan"></td>
                    </tr>

                    <tr>
                        <td class="label">Pekerjaan</td>
                        <td class="colon">:</td>
                        <td id="pPekerjaan"></td>
                    </tr>

                    <tr>
                        <td class="label">Status Perkawinan</td>
                        <td class="colon">:</td>
                        <td id="pStatusPerkawinan"></td>
                    </tr>

                    <tr>
                        <td class="label">Agama</td>
                        <td class="colon">:</td>
                        <td id="pAgama"></td>
                    </tr>

                    <tr>
                        <td class="label">No NIK</td>
                        <td class="colon">:</td>
                        <td id="pNik"></td>
                    </tr>

                    <tr>
                        <td class="label">Alamat</td>
                        <td class="colon">:</td>
                        <td id="pAlamat"></td>
                    </tr>
                </table>

                <p class="paragraf">
                    Nama tersebut diatas, benar adalah warga desa kami yang sepengetahuan kami berkelakuan baik.
                </p>

                <p class="paragraf">
                    Keterangan ini diberikan untuk keperluan : <span id="pKeperluan"></span>
                </p>

                <p class="paragraf">
                    Demikian surat keterangan ini kami buat dengan sebenarnya, dan untuk dipergunakan
                    sebagaimana mestinya.
                </p>

                <div class="ttd-area">
                    <div>
                        <span id="pTempatSurat">Laliko</span>,
                        <span id="pTanggalSurat">29 Oktober 2024</span>
                    </div>

                    <div>
                        Kepala Desa <span id="pDesaTtd">Laliko</span>
                    </div>

                    <div class="ttd-space"></div>

                    <div class="nama-pejabat" id="pKepalaDesa">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function getValue(id) {
            const element = document.getElementById(id);
            return element ? element.value.trim() : "";
        }

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

        function setText(id, value, fallback = "") {
            document.getElementById(id).textContent = value || fallback;
        }

        function updateSurat() {
            const desa = getValue("desa") || "Laliko";
            const kecamatan = getValue("kecamatan") || "Campalagian";
            const kabupaten = getValue("kabupaten") || "Polewali Mandar";
            const provinsi = getValue("provinsi") || "Sulawesi Barat";
            const kodePos = getValue("kodePos") || "91357";

            const nama = getValue("nama");
            const tempatLahir = getValue("tempatLahir");
            const tanggalLahir = formatTanggalIndonesia(getValue("tanggalLahir"));

            const tempatTanggalLahir = tempatLahir || tanggalLahir
                ? `${tempatLahir || "-"}, ${tanggalLahir || "-"}`
                : "";

            const tanggalSurat = formatTanggalIndonesia(getValue("tanggalSurat")) || "29 Oktober 2024";
            const nomorSurat = getValue("nomorSurat") || "/ /2026";
            const tempatSurat = getValue("tempatSurat") || desa;

            setText("pDesaKop", desa.toUpperCase());
            setText("pKecamatanKop", kecamatan.toUpperCase());
            setText("pKabupatenKop", kabupaten.toUpperCase());

            setText("pDesaAlamat", desa);
            setText("pKecamatanAlamat", kecamatan);
            setText("pKabupatenAlamat", kabupaten);
            setText("pProvinsiAlamat", provinsi);
            setText("pKodePos", kodePos);

            setText("pNomorSurat", nomorSurat);
            setText("pDesaIsi", desa);
            setText("pKecamatanIsi", kecamatan);
            setText("pKabupatenIsi", kabupaten);

            setText("pNama", nama);
            setText("pTempatTanggalLahir", tempatTanggalLahir);
            setText("pJenisKelamin", getValue("jenisKelamin"));
            setText("pKebangsaan", getValue("kebangsaan"));
            setText("pPekerjaan", getValue("pekerjaan"));
            setText("pStatusPerkawinan", getValue("statusPerkawinan"));
            setText("pAgama", getValue("agama"));
            setText("pNik", getValue("nik"));

            document.getElementById("pAlamat").innerHTML = (getValue("alamat") || "").replace(/\n/g, "<br>");

            setText("pKeperluan", getValue("keperluan"));

            setText("pTempatSurat", tempatSurat);
            setText("pTanggalSurat", tanggalSurat);
            setText("pDesaTtd", desa);
            setText("pKepalaDesa", getValue("kepalaDesa") || "\u00A0");
        }

        function downloadPDF() {
            updateSurat();
            window.print();
        }

        updateSurat();
    </script>
</body>
</html>
