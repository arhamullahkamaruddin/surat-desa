<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>e-Surat Desa</title>

    <link rel="icon" href="{{ asset('admin/assets/image/favicon.png') }}" type="image/png">

    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/assets/css/bootstrap-icons.css') }}">

    <style>
        body {
            background-color: #f5f7fb;
        }

        .navbar-brand {
            font-weight: 700;
        }

        .hero-section {
            background: linear-gradient(135deg, #0d6efd, #9ec5ff);
            color: #ffffff;
            padding: 80px 0;
        }

        .service-card {
            transition: 0.2s ease-in-out;
            border: 0;
            border-radius: 16px;
        }

        .service-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 24px rgba(0, 0, 0, 0.12);
        }

        .service-icon {
            width: 58px;
            height: 58px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: #eaf2ff;
            color: #0d6efd;
            font-size: 28px;
            margin-bottom: 16px;
        }

        .section-title {
            font-weight: 700;
            color: #202020;
        }

        .logout-button {
            border: none;
            background: transparent;
            padding: 0;
        }

        .footer {
            background-color: #ffffff;
            border-top: 1px solid #e9ecef;
        }

        .si-wa-float {
            position: fixed;
            right: 26px;
            bottom: 22px;
            z-index: 9998;

            transition:
                bottom .25s ease,
                transform .2s ease;
        }

        .si-wa-float__img {
            width: 90px;
            height: auto;
            display: block;

            object-fit: contain;

            filter: drop-shadow(0 10px 20px rgba(0, 0, 0, .18));
        }

        .si-wa-float:hover {
            transform: translateY(-3px);
        }

        @media (max-width:768px) {

            .si-wa-float {
                right: 16px;
            }

            .si-wa-float__img {
                width: 100px;
            }

        }
    </style>
</head>

<body>

    {{-- Navbar --}}
    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand text-primary" href="{{ route('home') }}">
                <i class="bi bi-envelope-paper me-1"></i>
                e-Surat Desa
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser"
                aria-controls="navbarUser" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarUser">
                <ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}">
                            Beranda
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('home') }}#layanan">
                            Layanan Surat
                        </a>
                    </li>

                    @guest
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm px-3" href="{{ route('login') }}">
                                Login
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="btn btn-primary btn-sm px-3" href="{{ route('register') }}">
                                Daftar
                            </a>
                        </li>
                    @endguest

                    @auth
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}#riwayat">
                                Riwayat Surat
                            </a>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">
                                <i class="bi bi-person-circle me-1"></i>
                                {{ Auth::user()->name }}
                            </a>

                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-person me-2"></i>
                                        Profil
                                    </a>
                                </li>

                                <li>
                                    <hr class="dropdown-divider">
                                </li>

                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-2"></i>
                                            Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @endauth

                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    {{-- Footer --}}
    <footer class="footer py-4">
        <div class="container">
            <div class="text-center text-muted">
                <small>
                    &copy; {{ date('Y') }} e-Surat Desa. Semua hak dilindungi.
                </small>
            </div>
        </div>
    </footer>

    @if ($village && $village->nomor_wa && !request()->routeIs('login') && !request()->routeIs('register'))
        <a class="si-wa-float"
            href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $village->nomor_wa) }}?text=Halo%20Admin%20Desa,%20saya%20ingin%20bertanya%20terkait%20layanan%20surat."
            target="_blank" rel="noopener noreferrer">

            <img class="si-wa-float__img" src="{{ asset('image/chat-with-us.png') }}" alt="Chat Admin">

        </a>
    @endif

    <script src="{{ asset('admin/assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
