<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body class="bg-light">
    <div id="app" data-pegawais="{{ (isset($pegawais) ? $pegawais : collect())->toJson() }}">
        <nav class="navbar navbar-expand-lg bg-white shadow-sm bg-gradient navbar-light mb-4">
            <div class="container-fluid">
                <a href="{{ route('index') }}" class="navbar-brand ms-5">Absensi Pegawai</a>
                <div class="me-5">
                    <ul class="navbar-nav ms-auto mb-lg-0">
                        @guest
                        <li class="nav-item">
                            <a-btn-component href="{{ route('login') }}">Log-in</a-btn-component>
                        </li>
                        @endguest
                        @auth
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="post">
                                @csrf
                                <a-btn-component href="{{ route('logout') }}" @click="submitPrevent">Log-Out</a-btn-component>
                                <!-- <a href="{{ route('logout') }}" @click="submit" class="btn btn-primary">Log-Out</a> -->
                            </form>
                        </li>
                        @endauth
                    </ul>
                </div>
            </div>
        </nav>
        <main>
            @if (session('success'))
            <script>
                alert(@js(session('success')));
            </script>
            @endif
            @if ($errors->any())
            <script>
                alert(@js($errors->first()));
            </script>
            @endif
            <div class="container card shadow-sm">
                <div class="card-body">
                    @yield('content')
                </div>
            </div>
        </main>
    </div>
</body>
</html>