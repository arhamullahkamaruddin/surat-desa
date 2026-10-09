<nav class="navbar navbar-expand px-3 border-bottom">
    <button class="btn" id="sidebar-toggle" type="button">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse navbar">
        <ul class="navbar-nav ms-auto">
            <li class="nav-item dropdown">
                <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                    <img src="{{ asset('admin/assets/image/profil.jpg') }}"
                         alt="Profil"
                         class="avatar img-fluid rounded">
                </a>

                <div class="dropdown-menu dropdown-menu-end">

                    <a href="{{ route('profile.edit') }}" class="dropdown-item">
                        Profil
                    </a>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="dropdown-item">
                            Logout
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>
