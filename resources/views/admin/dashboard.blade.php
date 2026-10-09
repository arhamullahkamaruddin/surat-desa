@extends('admin.layout')

@section('title', 'Admin | Dashboard')
@section('page-title', 'Dashboard Admin')

@section('content')

<div class="row mb-4">


<div class="col-12 col-md-6 d-flex">

    <div class="card flex-fill border-0 illustration">

        <div class="card-body p-0 d-flex flex-fill">

            <div class="row g-0 w-100">

                <div class="col-6">

                    <div class="p-3 m-1">

                        <h4>
                            Selamat Datang, Admin
                        </h4>

                        <p class="mb-0">
                            Dashboard pengelolaan surat desa.
                        </p>

                    </div>

                </div>

                <div class="col-6 align-self-end text-end">

                    <img
                        src="{{ asset('admin/assets/image/customer-support.jpg') }}"
                        alt="Customer Support"
                        class="img-fluid illustration-img">

                </div>

            </div>

        </div>

    </div>

</div>

<div class="col-12 col-md-6 d-flex">

    <div class="card flex-fill border-0">

        <div class="card-body py-4">

            <div class="d-flex align-items-start">

                <div class="flex-grow-1">

                    <h4 class="mb-2 display-5 fw-bold">
                        {{ $totalPengajuan }}
                    </h4>

                    <p class="mb-2 fs-5">
                        Total Pengajuan Surat
                    </p>

                </div>

                <div>
                    <i class="bi bi-envelope-paper display-4"></i>
                </div>

            </div>

        </div>

    </div>

</div>


</div>

<div class="row mb-4">


<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <h6 class="text-muted">
                Menunggu
            </h6>

            <h3>
                {{ $totalMenunggu }}
            </h3>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <h6 class="text-muted">
                Diproses
            </h6>

            <h3>
                {{ $totalDiproses }}
            </h3>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <h6 class="text-muted">
                Selesai
            </h6>

            <h3>
                {{ $totalSelesai }}
            </h3>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <h6 class="text-muted">
                Ditolak
            </h6>

            <h3>
                {{ $totalDitolak }}
            </h3>

        </div>

    </div>

</div>


</div>

<div class="card border-0">


<div class="card-header">

    <h5 class="card-title mb-0">
        Pengajuan Surat Terbaru
    </h5>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table align-middle text-nowrap">

            <thead>

                <tr>

                    <th>No</th>

                    <th>
                        Nomor Pengajuan
                    </th>

                    <th>
                        Nama Pemohon
                    </th>

                    <th>
                        NIK
                    </th>

                    <th>
                        Jenis Surat
                    </th>

                    <th>
                        Status
                    </th>

                    <th>
                        Tanggal
                    </th>

                    <th>
                        Aksi
                    </th>

                </tr>

            </thead>

            <tbody>

            @forelse($pengajuanTerbaru as $pengajuan)

                <tr>

                    <td>
                        {{ $loop->iteration }}
                    </td>

                    <td>
                        {{ $pengajuan->nomor_pengajuan }}
                    </td>

                    <td>
                        {{ $pengajuan->user->name }}
                    </td>

                    <td>
                        {{ $pengajuan->user->nik }}
                    </td>

                    <td>
                        {{ $pengajuan->jenisSurat->nama_surat }}
                    </td>

                    <td>

                        @if($pengajuan->status === 'menunggu')

                            <span class="badge bg-warning">
                                Menunggu
                            </span>

                        @elseif($pengajuan->status === 'diproses')

                            <span class="badge bg-info">
                                Diproses
                            </span>

                        @elseif($pengajuan->status === 'selesai')

                            <span class="badge bg-success">
                                Selesai
                            </span>

                        @else

                            <span class="badge bg-danger">
                                Ditolak
                            </span>

                        @endif

                    </td>

                    <td>
                        {{ $pengajuan->created_at->format('d-m-Y') }}
                    </td>

                    <td>

                        <a
                            href="{{ route('admin.pengajuan.show', $pengajuan) }}"
                            class="btn btn-sm btn-primary">

                            Detail

                        </a>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="8"
                        class="text-center text-muted">

                        Belum ada data pengajuan surat.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

</div>


</div>

@endsection
