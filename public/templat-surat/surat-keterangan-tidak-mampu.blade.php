<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Tidak Mampu/Miskin</title>

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
            background: #ffffff;
            border-radius: 12px;
            padding: 20px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
        }

        .panel h2 {
            margin-top: 0;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 13px;
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

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px;
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
            background: white;
            padding: 16mm 19mm 12mm;
            font-family: "Times New Roman", serif;
            font-size: 11.5pt;
            line-height: 1.22;
            color: #000;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 13.5pt;
            margin-bottom: 3px;
        }

        .nomor-surat {
            text-align: center;
            margin-bottom: 18px;
        }

        .paragraf {
            margin: 0 0 6px 0;
            text-align: justify;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 2px 0 7px 0;
        }

        .data-table td {
            padding: 1px 0;
            vertical-align: top;
        }

        .data-table .label {
            width: 185px;
        }

        .data-table .colon {
            width: 14px;
            text-align: center;
        }

        .signature-date {
            width: 250px;
            margin-left: auto;
            margin-top: 12px;
            text-align: left;
        }

        .menyetujui-text {
            margin: 6px 0 2px;
        }

        .signature-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 90px;
            margin-top: 2px;
            text-align: center;
        }

        .signature-title {
            margin-bottom: 38px;
        }

        .signature-name {
            display: inline-block;
            min-width: 175px;
            border-bottom: 1px dotted #000;
            padding-bottom: 1px;
            min-height: 18px;
        }

        .signature-center {
            width: 360px;
            margin: 4px auto 0;
            text-align: center;
        }

        .signature-center-title {
            margin-bottom: 38px;
        }

        .signature-center .signature-name {
            min-width: 210px;
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
                padding: 16mm 19mm 12mm !important;
                background: white !important;
                overflow: visible !important;
                page-break-after: auto !important;
                break-after: auto !important;
            }

            .signature-row,
            .signature-center {
                page-break-inside: avoid;
                break-inside: avoid;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel">
            <h2>Form Surat Tidak Mampu/Miskin</h2>

            <div class="form-group">
                <label>Nomor Surat</label>
                <input type="text" id="nomorSurat" placeholder="Contoh: 474/001/RT-RW/2026" />
            </div>

            <div class="form-group">
                <label>Nama Penandatangan Awal</label>
                <input type="text" id="namaPejabatAwal" placeholder="Nama Ketua RT/RW" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>RT</label>
                    <input type="text" id="rt" placeholder="001" />
                </div>

                <div class="form-group">
                    <label>RW</label>
                    <input type="text" id="rw" placeholder="002" />
                </div>
            </div>

            <div class="form-group">
                <label>Desa/Kelurahan</label>
                <input type="text" id="desa" value="Laliko" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kecamatan</label>
                    <input type="text" id="kecamatan" placeholder="Kecamatan" />
                </div>

                <div class="form-group">
                    <label>Kabupaten</label>
                    <input type="text" id="kabupaten" value="Polewali Mandar" />
                </div>
            </div>

            <hr>

            <div class="form-group">
                <label>Nama Anak</label>
                <input type="text" id="namaAnak" placeholder="Nama lengkap anak" />
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

            <div class="form-group">
                <label>Asal SD/MI</label>
                <input type="text" id="asalSekolah" placeholder="SD/MI ..." />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Kec. Sekolah</label>
                    <input type="text" id="kecSekolah" placeholder="Kecamatan sekolah" />
                </div>

                <div class="form-group">
                    <label>Kab./Kota Sekolah</label>
                    <input type="text" id="kabSekolah" placeholder="Kab./Kota sekolah" />
                </div>
            </div>

            <div class="form-group">
                <label>Provinsi Sekolah</label>
                <input type="text" id="provSekolah" placeholder="Provinsi sekolah" />
            </div>

            <div class="form-group">
                <label>Nama Orang Tua/Wali</label>
                <input type="text" id="namaOrtu" placeholder="Nama orang tua/wali" />
            </div>

            <div class="form-group">
                <label>Pekerjaan Orang Tua/Wali</label>
                <input type="text" id="pekerjaanOrtu" placeholder="Pekerjaan orang tua/wali" />
            </div>

            <div class="form-group">
                <label>Status Tempat Tinggal</label>
                <select id="statusTinggal">
                    <option value="Rumah Sendiri">Rumah Sendiri</option>
                    <option value="Rumah Keluarga">Rumah Keluarga</option>
                    <option value="Rumah Dinas">Rumah Dinas</option>
                    <option value="Sewa">Sewa</option>
                    <option value="Kontrak">Kontrak</option>
                    <option value="Kos">Kos</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>

            <div class="form-group">
                <label>Alamat KTP/KK</label>
                <textarea id="alamat" placeholder="Jln..., RT..., RW..., Desa/Kel..., Kec..., Kab/Kota..., Prov..."></textarea>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Tahun Ajaran</label>
                    <input type="text" id="tahunAjaran" value="2025/2026" />
                </div>

                <div class="form-group">
                    <label>Tahun Surat</label>
                    <input type="text" id="tahunSurat" value="2026" />
                </div>
            </div>

            <hr>

            <div class="form-row">
                <div class="form-group">
                    <label>Nama Ketua RW</label>
                    <input type="text" id="namaKetuaRw" placeholder="Nama Ketua RW" />
                </div>

                <div class="form-group">
                    <label>Nama Ketua RT</label>
                    <input type="text" id="namaKetuaRt" placeholder="Nama Ketua RT" />
                </div>
            </div>

            <div class="form-group">
                <label>Nama Kepala Desa/Kelurahan</label>
                <input type="text" id="namaKepalaDesa" placeholder="Nama Kepala Desa/Kelurahan" />
            </div>

            <div class="btn-group">
                <button class="btn-preview" onclick="updateSurat()">Lihat Hasil</button>
                <button class="btn-download" onclick="downloadPDF()">Download PDF</button>
            </div>
        </div>

        <div class="surat-wrapper" id="areaSurat">
            <div class="surat">
                <div class="judul-surat">SURAT KETERANGAN TIDAK MAMPU/MISKIN</div>

                <div class="nomor-surat">
                    Nomor : <span id="pNomorSurat">..................................</span>
                </div>

                <p class="paragraf">Yang bertanda tangan di bawah ini :</p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama</td>
                        <td class="colon">:</td>
                        <td id="pNamaPejabatAwal">........................................................................</td>
                    </tr>

                    <tr>
                        <td class="label">Jabatan</td>
                        <td class="colon">:</td>
                        <td>
                            Ketua RT <span id="pRt">.......</span>,
                            RW <span id="pRw">..........</span>,
                            Desa/Kelurahan <span id="pDesa">Laliko</span><br>
                            Kecamatan <span id="pKecamatan">..............................</span>,
                            Kabupaten <span id="pKabupaten">Polewali Mandar</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">menerangkan bahwa :</p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama Anak</td>
                        <td class="colon">:</td>
                        <td id="pNamaAnak">……………………………………………………................</td>
                    </tr>

                    <tr>
                        <td class="label">Tempat/tanggal Lahir</td>
                        <td class="colon">:</td>
                        <td id="pTempatTanggalLahir">……………………………………………………………......</td>
                    </tr>

                    <tr>
                        <td class="label">Asal SD/MI</td>
                        <td class="colon">:</td>
                        <td>
                            <span id="pAsalSekolah">SD/MI .............................................</span>,
                            Kec. <span id="pKecSekolah">......................</span><br>
                            Kab./Kota <span id="pKabSekolah">..............................</span>,
                            Prov. <span id="pProvSekolah">.................................</span>
                        </td>
                    </tr>

                    <tr>
                        <td class="label">Nama orang tua/wali</td>
                        <td class="colon">:</td>
                        <td id="pNamaOrtu">……………………………………………………………….</td>
                    </tr>

                    <tr>
                        <td class="label">Pekerjaan orang tua/wali</td>
                        <td class="colon">:</td>
                        <td id="pPekerjaanOrtu">.......................................................................................</td>
                    </tr>

                    <tr>
                        <td class="label">Status Tempat Tinggal</td>
                        <td class="colon">:</td>
                        <td id="pStatusTinggal">Rumah Sendiri (*)</td>
                    </tr>

                    <tr>
                        <td class="label">Alamat KTP/KK</td>
                        <td class="colon">:</td>
                        <td id="pAlamat">
                            Jln................................................., RT........, RW..........<br>
                            Desa/Kel..……………........…, Kec. ...............................<br>
                            Kab./Kota.............................., Prov. ...............................
                        </td>
                    </tr>
                </table>

                <p class="paragraf">
                    Dengan ini menerangkan bahwa anak tersebut benar-benar berasal dari keluarga tidak mampu/miskin.
                </p>

                <p class="paragraf">
                    Demikian surat keterangan tidak mampu ini kami buat dengan sebenarnya, untuk keperluan
                    pendaftaran SPMB di Kabupaten Polewali Mandar tahun ajaran
                    <span id="pTahunAjaran">2025/2026</span>.
                </p>

                <div class="signature-date">
                    <span id="pDesaTanggal">Laliko</span>, <span id="pTahunSurat">2026</span>
                </div>

                <p class="menyetujui-text">Menyetujui</p>

                <div class="signature-row">
                    <div class="signature-box">
                        <div class="signature-title">
                            Ketua RW <span id="pRwTtd">..........</span>
                        </div>

                        <div class="signature-name" id="pNamaKetuaRw">&nbsp;</div>
                    </div>

                    <div class="signature-box">
                        <div class="signature-title">
                            Ketua RT <span id="pRtTtd">.......</span>
                        </div>

                        <div class="signature-name" id="pNamaKetuaRt">&nbsp;</div>
                    </div>
                </div>

                <div class="signature-center">
                    <div>Mengetahui</div>

                    <div class="signature-center-title">
                        Kepala Desa/Kelurahan <span id="pDesaTtd">Laliko</span>
                    </div>

                    <div class="signature-name" id="pNamaKepalaDesa">&nbsp;</div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function valueOrDots(id, dots) {
            const value = document.getElementById(id).value.trim();
            return value || dots;
        }

        function formatTanggalIndonesia(tanggal) {
            if (!tanggal) return "……………………………………………………………......";

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

        function updateSurat() {
            const nomorSurat = valueOrDots("nomorSurat", "..................................");
            const namaPejabatAwal = valueOrDots("namaPejabatAwal", "........................................................................");
            const rt = valueOrDots("rt", ".......");
            const rw = valueOrDots("rw", "..........");
            const desa = valueOrDots("desa", "Laliko");
            const kecamatan = valueOrDots("kecamatan", "..............................");
            const kabupaten = valueOrDots("kabupaten", "Polewali Mandar");

            const namaAnak = valueOrDots("namaAnak", "……………………………………………………................");
            const tempatLahir = document.getElementById("tempatLahir").value.trim();
            const tanggalLahir = document.getElementById("tanggalLahir").value;

            const tempatTanggalLahir = tempatLahir || tanggalLahir
                ? `${tempatLahir || "-"}, ${formatTanggalIndonesia(tanggalLahir)}`
                : "……………………………………………………………......";

            const asalSekolah = valueOrDots("asalSekolah", "SD/MI .............................................");
            const kecSekolah = valueOrDots("kecSekolah", "......................");
            const kabSekolah = valueOrDots("kabSekolah", "..............................");
            const provSekolah = valueOrDots("provSekolah", ".................................");
            const namaOrtu = valueOrDots("namaOrtu", "……………………………………………………………….");
            const pekerjaanOrtu = valueOrDots("pekerjaanOrtu", ".......................................................................................");
            const statusTinggal = document.getElementById("statusTinggal").value;

            const alamat = valueOrDots(
                "alamat",
                "Jln................................................., RT........, RW..........\nDesa/Kel..……………........…, Kec. ...............................\nKab./Kota.............................., Prov. ..............................."
            );

            const tahunAjaran = valueOrDots("tahunAjaran", "2025/2026");
            const tahunSurat = valueOrDots("tahunSurat", "2026");
            const namaKetuaRw = valueOrDots("namaKetuaRw", "\u00A0");
            const namaKetuaRt = valueOrDots("namaKetuaRt", "\u00A0");
            const namaKepalaDesa = valueOrDots("namaKepalaDesa", "\u00A0");

            document.getElementById("pNomorSurat").textContent = nomorSurat;
            document.getElementById("pNamaPejabatAwal").textContent = namaPejabatAwal;
            document.getElementById("pRt").textContent = rt;
            document.getElementById("pRw").textContent = rw;
            document.getElementById("pDesa").textContent = desa;
            document.getElementById("pKecamatan").textContent = kecamatan;
            document.getElementById("pKabupaten").textContent = kabupaten;

            document.getElementById("pNamaAnak").textContent = namaAnak;
            document.getElementById("pTempatTanggalLahir").textContent = tempatTanggalLahir;
            document.getElementById("pAsalSekolah").textContent = asalSekolah;
            document.getElementById("pKecSekolah").textContent = kecSekolah;
            document.getElementById("pKabSekolah").textContent = kabSekolah;
            document.getElementById("pProvSekolah").textContent = provSekolah;
            document.getElementById("pNamaOrtu").textContent = namaOrtu;
            document.getElementById("pPekerjaanOrtu").textContent = pekerjaanOrtu;
            document.getElementById("pStatusTinggal").textContent = `${statusTinggal} (*)`;
            document.getElementById("pAlamat").innerHTML = alamat.replace(/\n/g, "<br>");

            document.getElementById("pTahunAjaran").textContent = tahunAjaran;
            document.getElementById("pDesaTanggal").textContent = desa;
            document.getElementById("pTahunSurat").textContent = tahunSurat;

            document.getElementById("pRwTtd").textContent = rw;
            document.getElementById("pRtTtd").textContent = rt;
            document.getElementById("pDesaTtd").textContent = desa;
            document.getElementById("pNamaKetuaRw").textContent = namaKetuaRw;
            document.getElementById("pNamaKetuaRt").textContent = namaKetuaRt;
            document.getElementById("pNamaKepalaDesa").textContent = namaKepalaDesa;
        }

        function downloadPDF() {
            updateSurat();
            window.print();
        }

        updateSurat();
    </script>
</body>
</html>