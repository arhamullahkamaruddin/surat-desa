@extends('admin.layout')

@section('title', 'Tambah Admin')
@section('page-title', 'Tambah Admin')

@section('content')

<div class="card border-0">


<div class="card-header">
    Tambah Admin
</div>

<div class="card-body">

    <form action="{{ route('superadmin.admin.store') }}"
          method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">
                Nama
            </label>

            <input type="text"
                   name="name"
                   class="form-control"
                   value="{{ old('name') }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Email
            </label>

            <input type="email"
                   name="email"
                   class="form-control"
                   value="{{ old('email') }}"
                   required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Password
            </label>

            <input type="password"
                   name="password"
                   class="form-control"
                   required>

        </div>

        <button type="submit"
                class="btn btn-primary">

            Simpan

        </button>

        <a href="{{ route('superadmin.admin.index') }}"
           class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>


</div>

@endsection
