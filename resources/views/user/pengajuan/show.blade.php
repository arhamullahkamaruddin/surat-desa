@extends('user.layout')

@section('title', 'Detail Pengajuan')

@section('content')

<div class="container py-5">

    @php
        $badge = match ($pengajuanSurat->status) {
            'menunggu' => 'warning',
            'diproses' => 'info',
            'selesai' => 'success',
            'ditolak' => 'danger',
            default => 'secondary',
        };
    @endphp

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h2 class="fw-bold mb-1">
                Detail Pengajuan Surat
            </h2>

            <p class="text-muted mb-0">
                Informasi lengkap pengajuan surat Anda.
            </p>

        </div>

        <a href="{{ route('home') }}#riwayat"
            class="btn btn-secondary">

            <i class="bi bi-arrow-left"></i>
            Kembali

        </a>

    </div>

    {{-- Informasi Pengajuan --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header">
            Informasi Pengajuan
        </div>

        <div class="card-body">

            <table class="table mb-0">

                <tr>
                    <th width="250">
                        Nomor Pengajuan
                    </th>
                    <td>
                        {{ $pengajuanSurat->nomor_pengajuan }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Jenis Surat
                    </th>
                    <td>
                        {{ $pengajuanSurat->jenisSurat->nama_surat }}
                    </td>
                </tr>

                <tr>
                    <th>
                        Status
                    </th>
                    <td>

                        <span class="badge bg-{{ $badge }}">

                            {{ ucfirst($pengajuanSurat->status) }}

                        </span>

                    </td>
                </tr>

                <tr>
                    <th>
                        Tanggal Pengajuan
                    </th>
                    <td>
                        {{ $pengajuanSurat->created_at->format('d-m-Y H:i') }}
                    </td>
                </tr>

                @if ($pengajuanSurat->nomor_surat)

                    <tr>

                        <th>
                            Nomor Surat
                        </th>

                        <td>
                            {{ $pengajuanSurat->nomor_surat }}
                        </td>

                    </tr>

                @endif

            </table>

        </div>

    </div>

    {{-- Catatan Admin --}}
    <div class="card border-0 shadow-sm mb-4">

        <div class="card-header">
            Catatan Admin
        </div>

        <div class="card-body">

            @if ($pengajuanSurat->catatan_admin)

                <div class="alert alert-info mb-0">

                    {{ $pengajuanSurat->catatan_admin }}

                </div>

            @else

                <span class="text-muted">

                    Belum ada catatan dari admin.

                </span>

            @endif

        </div>

    </div>

    {{-- Data Yang Dikirim --}}
    <div class="card border-0 shadow-sm">

        <div class="card-header">
            Data Yang Dikirim
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle mb-0">

                    @foreach ($pengajuanSurat->details as $detail)

                        <tr>

                            <th width="350">

                                {{ $detail->field->label }}

                            </th>

                            <td>

                                {{ $detail->value ?: '-' }}

                            </td>

                        </tr>

                    @endforeach

                </table>

            </div>

        </div>

    </div>

</div>

@endsection
