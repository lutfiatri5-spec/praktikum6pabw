<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'LaporBanjir') | BPBD Kabupaten Bandung</title>
    <link rel="stylesheet" href="{{ asset('css/laporbanjir.css') }}">
</head>
<body>
    <header class="navbar">
        <a href="{{ route('laporan.form') }}" class="brand">
            <span class="brand-icon">🚨</span>
            <span>LaporBanjir</span>
        </a>

        <nav>
            <a href="{{ route('laporan.form') }}">Form Laporan</a>
            @auth
                <a href="{{ route('laporan.index') }}">Daftar Laporan</a>
                <a href="{{ route('profile') }}">Profil Petugas</a>
                <form method="POST" action="{{ route('logout') }}" class="nav-logout">
                    @csrf
                    <button type="submit" class="nav-logout-button">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>
    </header>

    <main class="container">
        @if (session('success'))
            <div class="alert" role="status">{{ session('success') }}</div>
        @endif

        @if (session('error'))
            <div class="alert alert-error" role="alert">{{ session('error') }}</div>
        @endif

        @if ($errors->any())
            <div class="alert alert-error" role="alert">
                <strong>Periksa kembali data yang dimasukkan:</strong>
                <ul class="error-list">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <footer class="footer">
        <p>&copy; {{ date('Y') }} LaporBanjir - BPBD Kabupaten Bandung</p>
        <p>Informasi laporan banjir untuk membantu respons yang lebih cepat.</p>
    </footer>
</body>
</html>
