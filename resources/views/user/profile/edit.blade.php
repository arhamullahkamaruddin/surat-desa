@extends('user.layout')

@section('title', 'Profil')

@section('content')

@if (session('error'))
    <div class="alert alert-warning">
        {{ session('error') }}
    </div>
@endif

<div class="card border-0 shadow-sm">
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

<div class="card border-0 shadow-sm mt-3">
    <div class="card-header">
        <h5 class="mb-0">
            Ubah Password
        </h5>
    </div>

    <div class="card-body">
        @include('profile.partials.update-password-form')
    </div>
</div>

<div class="card border-0 shadow-sm mt-3">
    <div class="card-header">
        <h5 class="mb-0">
            Hapus Akun
        </h5>
    </div>

    <div class="card-body">
        @include('profile.partials.delete-user-form')
    </div>
</div>

@endsection
