<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    {{-- Header --}}
    <nav class="navbar navbar-light bg-white shadow-sm px-3">
        <a class="navbar-brand fw-bold text-primary" href="/dashboard">Payroll Hebat</a>
        <div class="d-flex align-items-center">
            <span class="me-3 text-muted">Halo, Satrio</span>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-sm btn-outline-danger">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
            {{-- Sidebar --}}
            <aside class="col-12 col-md-3 col-lg-2 bg-white border-end shadow-sm p-3 min-vh-100">
                <h6 class="fw-bold text-secondary mb-3">Menu</h6>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2">
                        <a href="{{ route('dashboard') }}"
                            class="nav-link {{ request()->routeIs('dashboard') ? 'active fw-semibold text-primary' : 'text-dark' }}">Dashboard</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('emp') }}"
                            class="nav-link {{ request()->routeIs('emp*') ? 'active fw-semibold text-primary' : 'text-dark' }}">Pegawai</a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('position') }}"
                            class="nav-link {{ request()->routeIs('position*') ? 'active fw-semibold text-primary' : 'text-dark' }}">Jabatan</a>
                    </li>

                    <li class="nav-item mb-2">
                        <a href="{{ route('payroll') }}"
                            class="nav-link {{ request()->routeIs('payroll*') ? 'active fw-semibold text-primary' : 'text-dark' }}">Payroll</a>
                    </li>
                    <li class="nav-item mb-2">
                        <a href="{{ route('user') }}"
                            class="nav-link {{ request()->routeIs('user*') ? 'active fw-semibold text-primary' : 'text-dark' }}">User</a>
                    </li>
                </ul>
            </aside>

            {{-- Konten --}}
            <main class="col-12 col-md-9 col-lg-10 p-4">
                <h2 class="fw-bold text-dark mb-4"></h2>

                {{-- Tempat Konten Utama --}}
                <div class="mt-4">
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    {{-- Footer --}}
    <footer class="bg-white border-top text-center py-3 mt-4 text-muted small">
        &copy; {{ date('Y') }} My Dashboard • All rights reserved
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>