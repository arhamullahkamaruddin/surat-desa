@extends('admin.layout')

@section('title', 'Edit Field')
@section('page-title', 'Edit Field Surat')

@section('content')

<div class="card border-0">
    <div class="card-body">

        <form
            action="{{ route('superadmin.jenis-surat.fields.update', [$jenisSurat, $field]) }}"
            method="POST">

            @csrf
            @method('PUT')

            @include('superadmin.surat-field._form')

        </form>

    </div>
</div>

@endsection
