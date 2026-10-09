@extends('admin.layout')

@section('title', 'Tambah Field')
@section('page-title', 'Tambah Field Surat')

@section('content')

<div class="card border-0">
    <div class="card-body">

        <form
            action="{{ route('superadmin.jenis-surat.fields.store', $jenisSurat) }}"
            method="POST">

            @csrf

            @include('superadmin.surat-field._form')

        </form>

    </div>
</div>

@endsection
