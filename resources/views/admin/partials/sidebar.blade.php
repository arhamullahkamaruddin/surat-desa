@php
    $user = auth()->user();
@endphp

<aside id="sidebar">


    <div class="vh-100 overflow-auto">

        <div class="sidebar-logo">

            <a
                href="{{ $user->role === 'superadmin' ? route('superadmin.dashboard') : route('admin.dashboard') }}">

                {{ $user->role === 'superadmin' ? 'Superadmin Desa' : 'Admin Desa' }}

            </a>

        </div>

        <ul class="sidebar-nav">

            <li class="sidebar-header">
                Menu Utama
            </li>

            <li class="sidebar-item">

                <a href="{{ $user->role === 'superadmin' ? route('superadmin.dashboard') : route('admin.dashboard') }}"
                    class="sidebar-link">

                    <i class="bi bi-speedometer2 pe-2"></i>
                    Dashboard

                </a>

            </li>

            <li class="sidebar-item">

                <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse" data-bs-target="#pengajuan">

                    <i class="bi bi-envelope-paper pe-2"></i>
                    Pengajuan Surat

                </a>

                <ul id="pengajuan" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                    <li class="sidebar-item">
                        <a href="{{ route('admin.pengajuan.index') }}" class="sidebar-link">
                            Semua Pengajuan
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('admin.pengajuan.status.filter', 'menunggu') }}" class="sidebar-link">
                            Menunggu
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('admin.pengajuan.status.filter', 'diproses') }}" class="sidebar-link">
                            Diproses
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('admin.pengajuan.status.filter', 'selesai') }}" class="sidebar-link">
                            Selesai
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="{{ route('admin.pengajuan.status.filter', 'ditolak') }}" class="sidebar-link">
                            Ditolak
                        </a>
                    </li>

                </ul>

            </li>

            {{-- DATA USER (KHUSUS ADMIN) --}}
            @if ($user->role === 'admin')
                <li class="sidebar-header">
                    Data User
                </li>

                <li class="sidebar-item">

                    <a href="{{ route('admin.user.index') }}" class="sidebar-link">

                        <i class="bi bi-people pe-2"></i>
                        Data User

                    </a>

                </li>

                <li class="sidebar-item">

                    <a href="{{ route('admin.user.create') }}" class="sidebar-link">

                        <i class="bi bi-person-plus pe-2"></i>
                        Tambah User

                    </a>

                </li>
            @endif

            @if ($user->role === 'superadmin')
                <li class="sidebar-header">
                    Data Desa
                </li>

                <li class="sidebar-item">

                    <a href="{{ route('superadmin.village-profile.edit') }}" class="sidebar-link">

                        <i class="bi bi-building pe-2"></i>
                        Profil Desa

                    </a>

                </li>

                <li class="sidebar-header">
                    Manajemen Akun
                </li>

                <li class="sidebar-item">

                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#akunManagement">

                        <i class="bi bi-people pe-2"></i>
                        Manajemen Akun

                    </a>

                    <ul id="akunManagement" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                        <li class="sidebar-item">

                            <a href="{{ route('superadmin.admin.index') }}" class="sidebar-link">

                                Data Admin

                            </a>

                        </li>

                        <li class="sidebar-item">

                            <a href="{{ route('superadmin.admin.create') }}" class="sidebar-link">

                                Tambah Admin

                            </a>

                        </li>

                        <li class="sidebar-item">

                            <a href="{{ route('superadmin.user.index') }}" class="sidebar-link">

                                Data User

                            </a>

                        </li>

                        <li class="sidebar-item">

                            <a href="{{ route('superadmin.user.create') }}" class="sidebar-link">

                                Tambah User

                            </a>

                        </li>

                    </ul>

                </li>

                <li class="sidebar-header">
                    Surat
                </li>

                <li class="sidebar-item">

                    <a href="#" class="sidebar-link collapsed" data-bs-toggle="collapse"
                        data-bs-target="#jenisSurat">

                        <i class="bi bi-file-earmark-text pe-2"></i>
                        Jenis Surat

                    </a>

                    <ul id="jenisSurat" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">

                        <li class="sidebar-item">

                            <a href="{{ route('superadmin.jenis-surat.index') }}" class="sidebar-link">

                                Data Jenis Surat

                            </a>

                        </li>

                        <li class="sidebar-item">

                            <a href="{{ route('superadmin.jenis-surat.create') }}" class="sidebar-link">

                                Tambah Jenis Surat

                            </a>

                        </li>

                    </ul>

                </li>
            @endif

            <li class="sidebar-header">
                Akun
            </li>

            <li class="sidebar-item">

                <a href="{{ route('profile.edit') }}" class="sidebar-link">

                    <i class="bi bi-person-circle pe-2"></i>
                    Profil

                </a>

            </li>

            <li class="sidebar-item">

                <form method="POST" action="{{ route('logout') }}" class="m-0">

                    @csrf

                    <button type="submit" class="sidebar-link logout-button">

                        <i class="bi bi-box-arrow-right pe-2"></i>
                        Logout

                    </button>

                </form>

            </li>

        </ul>

    </div>


</aside>
