@extends('admin.layout')

@section('title', 'Data User')
@section('page-title', 'Data User')

@section('content')

@php
$prefix = auth()->user()->role === 'superadmin'
? 'superadmin'
: 'admin';
@endphp

@if(session('success'))


<div class="alert alert-success">
    {{ session('success') }}
</div>


@endif

@if(session('error'))


<div class="alert alert-danger">
    {{ session('error') }}
</div>


@endif

<div class="card border-0">


<div class="card-header d-flex justify-content-between align-items-center">

    <h5 class="mb-0">
        Data User
    </h5>

    <a href="{{ route($prefix . '.user.create') }}"
        class="btn btn-primary">

        Tambah User

    </a>

</div>

<div class="card-body">

    <div class="table-responsive">

        <table class="table table-hover align-middle">

            <thead>

                <tr>

                    <th width="60">No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NIK</th>
                    <th>No. WA</th>
                    <th>Status Biodata</th>
                    <th>Dibuat</th>
                    <th width="180">Aksi</th>

                </tr>

            </thead>

            <tbody>

                @forelse($users as $user)

                    <tr>

                        <td>
                            {{ $users->firstItem() + $loop->index }}
                        </td>

                        <td>
                            {{ $user->name }}
                        </td>

                        <td>
                            {{ $user->email }}
                        </td>

                        <td>
                            {{ $user->nik ?: '-' }}
                        </td>

                        <td>
                            {{ $user->nomor_wa ?: '-' }}
                        </td>

                        <td>

                            @if($user->nik)

                                <span class="badge bg-success">
                                    Lengkap
                                </span>

                            @else

                                <span class="badge bg-warning text-dark">
                                    Belum Lengkap
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $user->created_at->format('d-m-Y') }}
                        </td>

                        <td>

                            <div class="d-flex gap-1">

                                <a href="{{ route($prefix . '.user.edit', $user) }}"
                                    class="btn btn-warning btn-sm">

                                    Edit

                                </a>

                                <form action="{{ route($prefix . '.user.destroy', $user) }}"
                                    method="POST"
                                    class="d-inline">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus user ini?')">

                                        Hapus

                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="8"
                            class="text-center text-muted py-4">

                            Belum ada data user.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

    @if($users->hasPages())

        <div class="mt-3">
            {{ $users->links() }}
        </div>

    @endif

</div>


</div>

@endsection
