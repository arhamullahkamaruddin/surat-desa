@extends('admin.layout')

@section('title', 'Tambah User')
@section('page-title', 'Tambah User')

@section('content')

@php
$prefix = auth()->user()->role === 'superadmin'
? 'superadmin'
: 'admin';
@endphp

<div class="card border-0">


<div class="card-header">

    <h5 class="mb-0">
        Tambah User
    </h5>

</div>

<div class="card-body">

    <form action="{{ route($prefix . '.user.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name') }}"
                required>

            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input
                type="email"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                value="{{ old('email') }}"
                required>

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror"
                required>

            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="d-flex gap-2">

            <button type="submit"
                    class="btn btn-primary">

                Simpan

            </button>

            <a href="{{ route($prefix . '.user.index') }}"
               class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </form>

</div>


</div>

@endsection
