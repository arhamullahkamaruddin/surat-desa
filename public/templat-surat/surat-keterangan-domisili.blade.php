<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Surat Keterangan Domisili</title>
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
        textarea {
            width: 100%;
            padding: 9px 10px;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-size: 14px;
        }

        textarea {
            min-height: 80px;
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

        .surat {
            width: 210mm;
            min-height: 297mm;
            margin: auto;
            background: white;
            padding: 34mm 24mm 22mm;
            font-family: "Times New Roman", serif;
            font-size: 12pt;
            line-height: 1.5;
            color: #000;
        }

        .judul-surat {
            text-align: center;
            font-weight: bold;
            text-decoration: underline;
            font-size: 14pt;
            margin-bottom: 34px;
        }

        .paragraf {
            margin: 0 0 12px 0;
            text-align: justify;
        }

        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 8px 0 20px 0;
        }

        .data-table td {
            padding: 3px 0;
            vertical-align: top;
        }

        .data-table .label {
            width: 145px;
        }

        .data-table .colon {
            width: 14px;
            text-align: center;
        }

        .alamat-line {
            display: block;
        }

        .signature-section {
            margin-top: 35px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 70px;
            align-items: start;
        }

        .signature-left,
        .signature-right {
            text-align: center;
        }

        .signature-title {
            margin-bottom: 72px;
        }

        .signature-name {
            display: inline-block;
            min-width: 190px;
            border-bottom: 1px dotted #000;
            padding-bottom: 2px;
        }

        .mengetahui {
            margin-bottom: 8px;
        }

        .kepala-title {
            margin-bottom: 72px;
        }

        .rw-box {
            text-align: center;
            margin-top: 20px;
        }

        .line-name {
            display: inline-block;
            min-width: 210px;
            border-bottom: 1px solid #000;
            height: 20px;
        }

        @media (max-width: 950px) {
            .container {
                grid-template-columns: 1fr;
            }
        }

        @media print {
            body {
                background: white;
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
                background: white;
            }

            .surat {
                width: 210mm;
                min-height: 297mm;
                margin: 0;
                padding: 34mm 24mm 22mm;
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
            <h2>Form Surat Keterangan Domisili</h2>

            <div class="form-row">
                <div class="form-group">
                    <label>RT</label>
                    <input type="text" id="rt" placeholder="Contoh: 001" />
                </div>
                <div class="form-group">
                    <label>RW</label>
                    <input type="text" id="rw" placeholder="Contoh: 002" />
                </div>
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

            <div class="form-group">
                <label>Jenis Kelamin</label>
                <input type="text" id="jenisKelamin" placeholder="Laki-laki / Perempuan" />
            </div>

            <div class="form-group">
                <label>Alamat</label>
                <textarea id="alamat" placeholder="Alamat lengkap"></textarea>
            </div>

            <hr>

            <div class="form-row">
                <div class="form-group">
                    <label>Hari Meninggal</label>
                    <input type="text" id="hariMeninggal" placeholder="Contoh: Senin" />
                </div>
                <div class="form-group">
                    <label>Tanggal Meninggal</label>
                    <input type="date" id="tanggalMeninggal" />
                </div>
            </div>

            <div class="form-group">
                <label>Tempat Meninggal</label>
                <input type="text" id="tempatMeninggal" placeholder="Tempat meninggal" />
            </div>

            <hr>

            <div class="form-group">
                <label>Nama Ketua RT</label>
                <input type="text" id="namaKetuaRt" placeholder="Nama Ketua RT" />
            </div>

            <div class="form-group">
                <label>Nama Ketua RW</label>
                <input type="text" id="namaKetuaRw" placeholder="Nama Ketua RW" />
            </div>

            <div class="form-group">
                <label>Nama Kepala Kelurahan</label>
                <input type="text" id="namaKepalaKelurahan" placeholder="Nama Kepala Kelurahan" />
            </div>

            <div class="btn-group">
                <button class="btn-preview" onclick="updateSurat()">Lihat Hasil</button>
                <button class="btn-download" onclick="downloadPDF()">Download PDF</button>
            </div>
        </div>

        <div class="surat-wrapper" id="areaSurat">
            <div class="surat">
                <div class="judul-surat">SURAT KETERANGAN DOMISILI</div>

                <p class="paragraf">
                    Yang bertanda tangan dibawah ini ketua RT<span id="pRt">…………..</span>, RW<span id="pRw">…………</span>,
                    menerangkan
                    dengan sebenarnya bahwa :
                </p>

                <table class="data-table">
                    <tr>
                        <td class="label">Nama</td>
                        <td class="colon">:</td>
                        <td id="pNama">………………………………………………..……..</td>
                    </tr>
                    <tr>
                        <td class="label">Tempat/tgl lahir</td>
                        <td class="colon">:</td>
                        <td id="pTempatTanggalLahir">………………………………………………………</td>
                    </tr>
                    <tr>
                        <td class="label">Jenis kelamin</td>
                        <td class="colon">:</td>
                        <td id="pJenisKelamin">……………………………………………….……...</td>
                    </tr>
                    <tr>
                        <td class="label">Alamat</td>
                        <td class="colon">:</td>
                        <td id="pAlamat">
                            <span class="alamat-line">………………………………………………………</span>
                            <span class="alamat-line">………………………………………………………</span>
                        </td>
                    </tr>
                </table>

                <p class="paragraf">
                    Semasa hidupnya adalah benar-benar penduduk kami, dan yang bersangkutan telah
                    meninggal dunia pada hari / tanggal <span id="pHariTanggalMeninggal">……………………………..</span> di
                    <span id="pTempatMeninggal">…………………………………….</span>
                </p>

                <p class="paragraf">
                    Demikian keterangan ini dibuat dengan sebenarnya, untuk dipergunakan sebagaimana
                    mestinya.
                </p>

                <div class="signature-section">
                    <div class="signature-left">
                        <div class="signature-title">Ketua RT</div>
                        <div class="signature-name" id="pNamaKetuaRt">……………………………..</div>
                    </div>

                    <div class="signature-right">
                        <div class="signature-title">Ketua RW</div>
                        <div class="signature-name" id="pNamaKetuaRw">……………………………..</div>
                    </div>

                </div>
                <div class="rw-box">
                    <div class="mengetahui">Mengetahui:</div>
                    <div class="kepala-title">Kepala Kelurahan:</div>
                    <div class="line-name" id="pNamaKepalaKelurahan"></div>
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

        function updateSurat() {
            const rt = valueOrDots("rt", "…………..");
            const rw = valueOrDots("rw", "…………");
            const nama = valueOrDots("nama", "………………………………………………..……..");
            const tempatLahir = document.getElementById("tempatLahir").value.trim();
            const tanggalLahir = document.getElementById("tanggalLahir").value;
            const jenisKelamin = valueOrDots("jenisKelamin", "……………………………………………….……...");
            const alamat = valueOrDots("alamat", "………………………………………………………\n………………………………………………………");

            const hariMeninggal = document.getElementById("hariMeninggal").value.trim();
            const tanggalMeninggal = document.getElementById("tanggalMeninggal").value;
            const tempatMeninggal = valueOrDots("tempatMeninggal", "…………………………………….");

            const namaKetuaRt = valueOrDots("namaKetuaRt", "……………………………..");
            const namaKetuaRw = valueOrDots("namaKetuaRw", "……………………………..");
            const namaKepalaKelurahan = document.getElementById("namaKepalaKelurahan").value.trim();

            const tempatTanggalLahir = tempatLahir || tanggalLahir
                ? `${tempatLahir || "-"}, ${formatTanggalIndonesia(tanggalLahir) || "-"}`
                : "………………………………………………………";

            const hariTanggalMeninggal = hariMeninggal || tanggalMeninggal
                ? `${hariMeninggal || "-"}, ${formatTanggalIndonesia(tanggalMeninggal) || "-"}`
                : "……………………………..";

            document.getElementById("pRt").textContent = rt;
            document.getElementById("pRw").textContent = rw;
            document.getElementById("pNama").textContent = nama;
            document.getElementById("pTempatTanggalLahir").textContent = tempatTanggalLahir;
            document.getElementById("pJenisKelamin").textContent = jenisKelamin;
            document.getElementById("pAlamat").innerHTML = alamat.replace(/\n/g, "<br>");
            document.getElementById("pHariTanggalMeninggal").textContent = hariTanggalMeninggal;
            document.getElementById("pTempatMeninggal").textContent = tempatMeninggal;
            document.getElementById("pNamaKetuaRt").textContent = namaKetuaRt;
            document.getElementById("pNamaKetuaRw").textContent = namaKetuaRw;
            document.getElementById("pNamaKepalaKelurahan").textContent = namaKepalaKelurahan;
        }

        function downloadPDF() {
            updateSurat();
            window.print();
        }

        updateSurat();
    </script>
</body>

</html>