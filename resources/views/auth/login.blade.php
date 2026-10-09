@extends('user.layout')

@section('title', 'Login')

@section('content')

    <div class="container py-5">

        <div class="row justify-content-center">

            <div class="col-lg-5 col-md-7">

                <div class="card border-0 shadow-lg">

                    <div class="card-body p-5">

                        <div class="text-center mb-4">

                            <div class="service-icon mx-auto mb-3">
                                <i class="bi bi-person-lock"></i>
                            </div>

                            <h2 class="fw-bold">
                                Login
                            </h2>

                            <p class="text-muted mb-0">
                                Masuk ke sistem e-Surat Desa
                            </p>

                        </div>

                        <x-auth-session-status class="alert alert-success" :status="session('status')" />

                        <form method="POST" action="{{ route('login') }}">

                            @csrf

                            <div class="mb-3">

                                <label for="email" class="form-label">

                                    Email

                                </label>

                                <input id="email" type="email" name="email" value="{{ old('email') }}"
                                    class="form-control @error('email') is-invalid @enderror" required autofocus
                                    autocomplete="username">

                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="mb-3">

                                <label for="password" class="form-label">

                                    Password

                                </label>

                                <input id="password" type="password" name="password"
                                    class="form-control @error('password') is-invalid @enderror" required
                                    autocomplete="current-password">

                                @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            </div>

                            <div class="d-flex justify-content-between align-items-center mb-4">

                                <div class="form-check">

                                    <input class="form-check-input" type="checkbox" name="remember" id="remember_me">

                                    <label class="form-check-label" for="remember_me">

                                        Remember Me

                                    </label>

                                </div>

                                @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-decoration-none">

                                        Lupa Password?

                                    </a>
                                @endif

                            </div>

                            <button type="submit" class="btn btn-primary w-100">

                                <i class="bi bi-box-arrow-in-right me-1"></i>

                                Login

                            </button>

                        </form>

                        <hr>

                        <div class="text-center">

                            Belum punya akun?

                            <a href="{{ route('register') }}" class="text-decoration-none fw-semibold">

                                Daftar Sekarang

                            </a>

                        </div>

                    </div>

                </div>

            </div>

        </div>

    </div>

@endsection
