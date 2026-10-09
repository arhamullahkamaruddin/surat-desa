<!DOCTYPE html>
<html lang="id" data-bs-theme="light">

<head>
    @include('admin.partials.head')
</head>

<body>
    <div class="wrapper">

        @include('admin.partials.sidebar')

        <div class="main">

            @include('admin.partials.navbar')

            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>@yield('page-title', 'Dashboard')</h4>
                    </div>

                    @yield('content')
                </div>
            </main>

            @include('admin.partials.footer')

        </div>
    </div>

    @include('admin.partials.script')
</body>

</html>
