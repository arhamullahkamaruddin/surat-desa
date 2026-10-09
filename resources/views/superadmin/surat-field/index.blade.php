@extends('admin.layout')

@section('title', 'Field Surat')
@section('page-title', 'Field Surat')

@section('content')

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="card border-0">

    <div class="card-header d-flex justify-content-between align-items-center">

        <div>
            <h5 class="mb-0">
                Field Surat
            </h5>

            <small class="text-muted">
                {{ $jenisSurat->nama_surat }}
            </small>
        </div>

        <a href="{{ route('superadmin.jenis-surat.fields.create', $jenisSurat) }}"
           class="btn btn-primary">
            Tambah Field
        </a>

    </div>

    <div class="card-body">

        <div class="table-responsive">

            <table class="table align-middle">

                <thead>
                    <tr>
                        <th>No</th>
                        <th>Label</th>
                        <th>Name</th>
                        <th>Tipe</th>
                        <th>Wajib</th>
                        <th>Urutan</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($fields as $field)

                        <tr>

                            <td>
                                {{ $loop->iteration }}
                            </td>

                            <td>
                                {{ $field->label }}
                            </td>

                            <td>
                                <code>{{ $field->name }}</code>
                            </td>

                            <td>
                                <span class="badge bg-secondary">
                                    {{ $field->type }}
                                </span>
                            </td>

                            <td>

                                @if ($field->is_required)
                                    <span class="badge bg-success">
                                        Ya
                                    </span>
                                @else
                                    <span class="badge bg-danger">
                                        Tidak
                                    </span>
                                @endif

                            </td>

                            <td>
                                {{ $field->sort_order }}
                            </td>

                            <td>

                                <a href="{{ route('superadmin.jenis-surat.fields.edit', [$jenisSurat, $field]) }}"
                                   class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="{{ route('superadmin.jenis-surat.fields.destroy', [$jenisSurat, $field]) }}"
                                      method="POST"
                                      class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Hapus field ini?')">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>

                    @empty

                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Belum ada field untuk jenis surat ini.
                            </td>
                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

@endsection
