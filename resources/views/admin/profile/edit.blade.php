@extends('admin.layout')

@section('title', 'Profil')
@section('page-title', 'Profil')

@section('content')

<div class="card border-0">
    <div class="card-header">
        <h5 class="mb-0">
            Data Profil
        </h5>
    </div>

    <div class="card-body">

        @if (session('status') === 'profile-updated')
            <div class="alert alert-success">
                Profil berhasil diperbarui.
            </div>
        @endif

        @include('profile.partials.update-profile-information-form')

    </div>
</div>

<div class="card border-0 mt-3">
    <div class="card-header">
        <h5 class="mb-0">
            Ubah Password
        </h5>
    </div>

    <div class="card-body">
        @include('profile.partials.update-password-form')
    </div>
</div>

@endsection
