@extends('admin.layout')

@section('title', 'Tambah Jenis Surat')
@section('page-title', 'Tambah Jenis Surat')

@section('content')

<div class="card border-0">

    <div class="card-body">

        <form
            action="{{ route('superadmin.jenis-surat.store') }}"
            method="POST">

            @csrf

            @include('admin.jenis-surat._form')

        </form>

    </div>

</div>

@endsection
