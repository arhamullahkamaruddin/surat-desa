@extends('admin.layout')

@section('title', 'Superadmin | Dashboard')
@section('page-title', 'Dashboard Superadmin')

@section('content')

@php
$badgeStatus = [
'menunggu' => 'warning',
'diproses' => 'primary',
'selesai' => 'success',
'ditolak' => 'danger',
];
@endphp

<div class="row mb-4">


<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <i class="bi bi-people display-5"></i>

            <h3 class="mt-2">
                {{ $totalUser }}
            </h3>

            <p class="mb-0">
                Total User
            </p>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <i class="bi bi-person-gear display-5"></i>

            <h3 class="mt-2">
                {{ $totalAdmin }}
            </h3>

            <p class="mb-0">
                Total Admin
            </p>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <i class="bi bi-file-earmark-text display-5"></i>

            <h3 class="mt-2">
                {{ $totalJenisSurat }}
            </h3>

            <p class="mb-0">
                Jenis Surat
            </p>

        </div>

    </div>

</div>

<div class="col-md-3 mb-3">

    <div class="card border-0">

        <div class="card-body text-center">

            <i class="bi bi-envelope-paper display-5"></i>

            <h3 class="mt-2">
                {{ $totalPengajuan }}
            </h3>

            <p class="mb-0">
                Total Pengajuan
            </p>

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

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th>No</th>
                    <th>Nomor Pengajuan</th>
                    <th>Pemohon</th>
                    <th>Jenis Surat</th>
                    <th>Status</th>
                    <th>Tanggal</th>

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
                            {{ $pengajuan->jenisSurat->nama_surat }}
                        </td>

                        <td>

                            <span class="badge bg-{{ $badgeStatus[$pengajuan->status] ?? 'secondary' }}">

                                {{ ucfirst($pengajuan->status) }}

                            </span>

                        </td>

                        <td>
                            {{ $pengajuan->created_at->format('d-m-Y') }}
                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="6"
                            class="text-center text-muted">

                            Belum ada data.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>


</div>

@endsection
