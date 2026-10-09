@extends('admin.layout')

@section('title', 'Edit Jenis Surat')
@section('page-title', 'Edit Jenis Surat')

@section('content')

<div class="card border-0">

    <div class="card-body">

        <form
            action="{{ route('superadmin.jenis-surat.update', $jenisSurat) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('superadmin.jenis-surat._form')

        </form>

    </div>

</div>

@endsection
