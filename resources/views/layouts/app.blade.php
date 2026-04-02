<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>PaperShop</title>

    <!-- Favicon -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>🎒</text></svg>">
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="/">🎒 PaperShop</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('productes.index') }}">📦 Catàleg</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @if(session('admin'))
                        <li class="nav-item">
                            <span class="nav-link text-success fw-bold">👤 Admin</span>
                        </li>
                        <li class="nav-item">
                            <a class="btn btn-outline-danger btn-sm mt-2" href="{{ route('logout') }}">
                                Tancar sessió
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a class="btn btn-outline-primary btn-sm mt-2" href="{{ route('login') }}">
                                🔐 Admin
                            </a>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>

        @if(session('success'))
        <div class="container mt-3">
            <div class="alert alert-success">{{ session('success') }}</div>
        </div>
        @endif

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>