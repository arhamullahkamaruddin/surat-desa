@extends('user.layout')

@section('title', 'e-Surat Desa')

@section('content')
    {{-- Hero --}}
    <section class="hero-section">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <h1 class="display-5 fw-bold mb-3">
                        Layanan Pengajuan Surat Desa Online
                    </h1>

                    <p class="lead mb-4">
                        Ajukan surat administrasi desa secara mudah, cepat, dan dapat dipantau statusnya langsung
                        melalui sistem.
                    </p>

                    @guest
                        <a href="{{ route('login') }}" class="btn btn-light btn-lg me-2">
                            Login untuk Mengajukan
                        </a>

                        <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">
                            Daftar Akun
                        </a>
                    @endguest

                    @auth
                        <a href="#layanan" class="btn btn-light btn-lg">
                            Pilih Layanan Surat
                        </a>
                    @endauth
                </div>

                <div class="col-lg-5 mt-5 mt-lg-0 text-center">
                    <div class="bg-white text-primary rounded-4 shadow p-5">
                        <i class="bi bi-file-earmark-text display-1"></i>
                        <h4 class="mt-3 mb-0 fw-bold">e-Surat Desa</h4>
                        <p class="text-muted mb-0">Pelayanan surat lebih praktis</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Layanan Surat --}}
    <section id="layanan" class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="section-title">Layanan Surat</h2>
                <p class="text-muted mb-0">
                    Pilih jenis surat yang ingin diajukan.
                </p>
            </div>

            <div class="row g-4">
                @foreach ($jenisSurats as $surat)
                    <div class="col-12 col-md-6 col-lg-4">
                        <div class="card service-card h-100 shadow-sm">
                            <div class="card-body p-4">
                                <div class="service-icon">
                                    <i class="bi bi-file-earmark-text"></i>
                                </div>

                                <h5 class="fw-bold mb-2">
                                    {{ $surat->nama_surat }}
                                </h5>

                                <p class="text-muted">
                                    {{ $surat->deskripsi }}
                                </p>

                                @auth
                                    @if (Auth::user()->role === 'user')
                                        <a href="{{ route('user.pengajuan.create', $surat) }}"
                                            class="btn btn-primary w-100 mt-2">
                                            <i class="bi bi-send me-1"></i>
                                            Ajukan Surat
                                        </a>
                                    @else
                                        <a href="{{ route('dashboard') }}" class="btn btn-outline-primary w-100 mt-2">
                                            Masuk Dashboard
                                        </a>
                                    @endif
                                @endauth

                                @guest
                                    <a href="{{ route('login') }}" class="btn btn-outline-primary w-100 mt-2">
                                        Login untuk Mengajukan
                                    </a>
                                @endguest
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Riwayat Pengajuan --}}
    @auth
        @if (Auth::user()->role === 'user')
            <section id="riwayat" class="py-5 bg-white">
                <div class="container">
                    <div class="mb-4">
                        <h2 class="section-title">Riwayat Pengajuan Surat</h2>
                        <p class="text-muted mb-0">
                            Berikut adalah riwayat pengajuan surat milik Anda.
                        </p>
                    </div>

                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table align-middle text-nowrap">
                                    <thead class="table-light">
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis Surat</th>
                                            <th>Status</th>
                                            <th>Tanggal Pengajuan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>

                                    <tbody>

                                        @forelse ($pengajuans as $pengajuan)
                                            <tr>

                                                <td>
                                                    {{ $loop->iteration }}
                                                </td>

                                                <td>
                                                    {{ $pengajuan->jenisSurat->nama_surat }}
                                                </td>

                                                <td>

                                                    @switch($pengajuan->status)
                                                        @case('menunggu')
                                                            <span class="badge bg-warning text-dark">
                                                                Menunggu
                                                            </span>
                                                        @break

                                                        @case('diproses')
                                                            <span class="badge bg-info">
                                                                Diproses
                                                            </span>
                                                        @break

                                                        @case('selesai')
                                                            <span class="badge bg-success">
                                                                Selesai
                                                            </span>
                                                        @break

                                                        @case('ditolak')
                                                            <span class="badge bg-danger">
                                                                Ditolak
                                                            </span>
                                                        @break

                                                        @default
                                                            <span class="badge bg-secondary">
                                                                {{ $pengajuan->status }}
                                                            </span>
                                                    @endswitch

                                                </td>

                                                <td>
                                                    {{ $pengajuan->created_at->format('d-m-Y H:i') }}
                                                </td>

                                                <td>

                                                    <a href="{{ route('user.pengajuan.show', $pengajuan) }}"
                                                        class="btn btn-primary btn-sm">

                                                        Detail

                                                    </a>

                                                </td>

                                            </tr>

                                            @empty

                                                <tr>

                                                    <td colspan="5" class="text-center text-muted">

                                                        Belum ada pengajuan surat.

                                                    </td>

                                                </tr>
                                            @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            @endif
        @endauth
    @endsection
