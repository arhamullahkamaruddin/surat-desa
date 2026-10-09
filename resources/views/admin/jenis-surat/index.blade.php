@extends('admin.layout')

@section('title', 'Data Jenis Surat')
@section('page-title', 'Data Jenis Surat')

@section('content')

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                Data Jenis Surat
            </h5>

            <a href="{{ route('superadmin.jenis-surat.create') }}" class="btn btn-primary">
                Tambah Jenis Surat
            </a>
        </div>

        <div class="card-body">

            <div class="table-responsive">

                <table class="table align-middle">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Surat</th>
                            <th>Kode</th>
                            <th>Template</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>

                        @forelse($jenisSurats as $jenisSurat)
                            <tr>
                                <td>{{ $loop->iteration }}</td>

                                <td>
                                    {{ $jenisSurat->nama_surat }}
                                </td>

                                <td>
                                    {{ $jenisSurat->kode_surat }}
                                </td>

                                <td>
                                    {{ $jenisSurat->template_view }}
                                </td>

                                <td>
                                    @if ($jenisSurat->is_active)
                                        <span class="badge bg-success">
                                            Aktif
                                        </span>
                                    @else
                                        <span class="badge bg-danger">
                                            Nonaktif
                                        </span>
                                    @endif
                                </td>

                                <td>

                                    <a href="{{ route('superadmin.jenis-surat.fields.index', $jenisSurat) }}"
                                        class="btn btn-info btn-sm">
                                        Field
                                    </a>

                                    <a href="{{ route('superadmin.jenis-surat.edit', $jenisSurat) }}"
                                        class="btn btn-warning btn-sm">
                                        Edit
                                    </a>

                                    <form action="{{ route('superadmin.jenis-surat.destroy', $jenisSurat) }}" method="POST"
                                        class="d-inline">

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"
                                            onclick="return confirm('Hapus jenis surat ini?')">
                                            Hapus
                                        </button>

                                    </form>

                                </td>
                            </tr>

                        @empty

                            <tr>
                                <td colspan="6" class="text-center">
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
