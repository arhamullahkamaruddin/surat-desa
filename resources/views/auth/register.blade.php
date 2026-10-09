@extends('user.layout')

@section('title', 'Daftar Akun')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">

        <div class="col-lg-5 col-md-7">

            <div class="card border-0 shadow-lg">

                <div class="card-body p-5">

                    <div class="text-center mb-4">

                        <div class="service-icon mx-auto mb-3">
                            <i class="bi bi-person-plus"></i>
                        </div>

                        <h2 class="fw-bold">
                            Daftar Akun
                        </h2>

                        <p class="text-muted mb-0">
                            Buat akun untuk mengajukan surat desa secara online.
                        </p>

                    </div>

                    <form method="POST"
                        action="{{ route('register') }}">

                        @csrf

                        <div class="mb-3">

                            <label for="name"
                                class="form-label">

                                Nama Lengkap

                            </label>

                            <input
                                id="name"
                                type="text"
                                name="name"
                                value="{{ old('name') }}"
                                class="form-control @error('name') is-invalid @enderror"
                                required
                                autofocus
                                autocomplete="name">

                            @error('name')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="email"
                                class="form-label">

                                Email

                            </label>

                            <input
                                id="email"
                                type="email"
                                name="email"
                                value="{{ old('email') }}"
                                class="form-control @error('email') is-invalid @enderror"
                                required
                                autocomplete="username">

                            @error('email')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        <div class="mb-3">

                            <label for="password"
                                class="form-label">

                                Password

                            </label>

                            <input
                                id="password"
                                type="password"
                                name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                required
                                autocomplete="new-password">

                            @error('password')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        <div class="mb-4">

                            <label for="password_confirmation"
                                class="form-label">

                                Konfirmasi Password

                            </label>

                            <input
                                id="password_confirmation"
                                type="password"
                                name="password_confirmation"
                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                required
                                autocomplete="new-password">

                            @error('password_confirmation')

                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>

                            @enderror

                        </div>

                        <button type="submit"
                            class="btn btn-primary w-100">

                            <i class="bi bi-person-check me-1"></i>

                            Daftar

                        </button>

                    </form>

                    <hr>

                    <div class="text-center">

                        Sudah memiliki akun?

                        <a href="{{ route('login') }}"
                            class="text-decoration-none fw-semibold">

                            Login

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</div>

@endsection

