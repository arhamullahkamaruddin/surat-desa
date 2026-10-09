@extends('admin.layout')

@section('title', 'Data Admin')
@section('page-title', 'Data Admin')

@section('content')

@if(session('success')) <div class="alert alert-success">
{{ session('success') }} </div>
@endif

@if(session('error')) <div class="alert alert-danger">
{{ session('error') }} </div>
@endif

<div class="card border-0">


<div class="card-header d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        Data Admin
    </h5>

    <a href="{{ route('superadmin.admin.create') }}"
       class="btn btn-primary">

        Tambah Admin

    </a>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table align-middle">

            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Dibuat</th>
                    <th width="180">Aksi</th>
                </tr>
            </thead>

            <tbody>

            @forelse($admins as $admin)

                <tr>

                    <td>
                        {{ $admins->firstItem() + $loop->index }}
                    </td>

                    <td>
                        {{ $admin->name }}
                    </td>

                    <td>
                        {{ $admin->email }}
                    </td>

                    <td>
                        {{ $admin->created_at->format('d-m-Y') }}
                    </td>

                    <td>

                        <a href="{{ route('superadmin.admin.edit', $admin) }}"
                           class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('superadmin.admin.destroy', $admin) }}"
                              method="POST"
                              class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('Hapus admin ini?')">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="text-center text-muted">

                        Belum ada data admin.

                    </td>

                </tr>

            @endforelse

            </tbody>

        </table>

    </div>

    {{ $admins->links() }}

</div>


</div>

@endsection
