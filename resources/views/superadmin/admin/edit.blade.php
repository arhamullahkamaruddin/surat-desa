@extends('admin.layout')

@section('title', 'Edit Admin')
@section('page-title', 'Edit Admin')

@section('content')

<div class="card border-0">


<div class="card-header">
    Edit Admin
</div>

<div class="card-body">

    <form action="{{ route('superadmin.admin.update', $admin) }}"
          method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name', $admin->name) }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email', $admin->email) }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password Baru
            </label>

            <input type="password"
                   name="password"
                   class="form-control">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengubah password.
            </small>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan Perubahan

        </button>

        <a href="{{ route('superadmin.admin.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>


</div>

@endsection
