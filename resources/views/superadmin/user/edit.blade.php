@extends('admin.layout')

@section('title', 'Edit User')
@section('page-title', 'Edit User')

@section('content')

@php
$prefix = auth()->user()->role === 'superadmin'
? 'superadmin'
: 'admin';
@endphp

<div class="card border-0">


<div class="card-header">

    <h5 class="mb-0">
        Edit User
    </h5>

</div>

<div class="card-body">

    <form action="{{ route($prefix . '.user.update', $user) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama
            </label>

            <input
                type="text"
                name="name"
                class="form-control @error('name') is-invalid @enderror"
                value="{{ old('name', $user->name) }}"
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
                value="{{ old('email', $user->email) }}"
                required>

            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password Baru
            </label>

            <input
                type="password"
                name="password"
                class="form-control @error('password') is-invalid @enderror">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengubah password.
            </small>

            @error('password')
                <div class="invalid-feedback d-block">
                    {{ $message }}
                </div>
            @enderror

        </div>

        <div class="d-flex gap-2">

            <button type="submit"
                    class="btn btn-primary">

                Simpan Perubahan

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
