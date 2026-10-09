@extends('admin.layout')

@section('title', 'Data Pengajuan Surat')
@section('page-title', 'Data Pengajuan Surat')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0">

        <div class="card-body">
            <h4 class="mb-3">

                @isset($status)
                    Data Pengajuan
                    {{ ucfirst($status) }}
                @else
                    Semua Pengajuan
                @endisset

            </h4>

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Pengajuan</th>
                            <th>Pemohon</th>
                            <th>Jenis Surat</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($pengajuans as $pengajuan)
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

                                    @if ($pengajuan->status === 'menunggu')
                                        <span class="badge bg-warning text-dark">
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

                                    <a href="{{ route('admin.pengajuan.show', $pengajuan) }}"
                                        class="btn btn-primary btn-sm">
                                        Detail
                                    </a>

                                </td>

                            </tr>

                        @empty

                            <tr>
                                <td colspan="7" class="text-center text-muted">
                                    Belum ada pengajuan surat.
                                </td>
                            </tr>
                        @endforelse

                    </tbody>

                </table>

            </div>

            <div class="mt-3">
                {{ $pengajuans->links() }}
            </div>

        </div>

    </div>

@endsection
