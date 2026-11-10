<!doctype html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color" content="#f4f6fb">
    <title>@yield('title', 'Portal OSIS') | SMA Negeri 1 Babelan</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="app-shell">
        <aside class="sidebar">
            <a class="brand" href="{{ route('Landing') }}" aria-label="Beranda Pendaftaran OSIS SMA Negeri 1 Babelan">
                <span class="brand-name">OSIS</span>
                <span class="brand-school">SMA Negeri 1 Babelan</span>
            </a>

            <nav class="main-nav" aria-label="Navigasi utama">
                <a class="nav-link{{ request()->routeIs('Landing') ? ' is-active' : '' }}" href="{{ route('Landing') }}">Beranda</a>
                <a class="nav-link{{ request()->routeIs('osis.*') ? ' is-active' : '' }}" href="{{ route('osis.index') }}">Pendaftaran OSIS</a>
                <a class="nav-link{{ request()->routeIs('siswa.*') ? ' is-active' : '' }}" href="{{ route('siswa.index') }}">Data Siswa</a>
                <a class="nav-link{{ request()->routeIs('kelas.*') ? ' is-active' : '' }}" href="{{ route('kelas.index') }}">Data Kelas</a>
                <a class="nav-link{{ request()->routeIs('jeniskelamin.*') ? ' is-active' : '' }}" href="{{ route('jeniskelamin.index') }}">Jenis Kelamin</a>
            </nav>

            <div class="sidebar-footer">
                <span>Portal pendaftaran</span>
                <strong>SMA Negeri 1 Babelan</strong>
            </div>
        </aside>

        <div class="main-shell">
            <header class="topbar">
                <span class="topbar-title">Pendaftaran OSIS</span>
                <span class="user-label">Siswa</span>
            </header>

            <main class="page-content">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
