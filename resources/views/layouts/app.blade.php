<!DOCTYPE html>

<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIAKAD - @yield('title')</title>


{{-- Bootstrap --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

{{-- Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
body {
    margin: 0;
    padding: 0;
}

/* NAVBAR */
.navbar {
    background: linear-gradient(90deg, #0d6efd, #0b5ed7);
    box-shadow: 0 4px 12px rgba(0,0,0,0.1);
}

.navbar .nav-link {
    color: rgba(255,255,255,0.85);
    transition: 0.3s;
}

.navbar .nav-link:hover {
    color: #fff;
}

/* ACTIVE CLEAN */
.navbar .nav-link.active {
    color: #fff;
    font-weight: 600;
    background: none !important;
}

/* LOGOUT */
.btn-logout {
    background: #0a58ca;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 6px 14px;
}

.btn-logout:hover {
    background: #084298;
}
</style>


</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">SIAKAD</a>


    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ms-auto align-items-center gap-2">

            @auth
                @if(auth()->user()->role === 'admin')

                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dosen.index') }}">
                            <i class="bi bi-person-badge"></i> Dosen
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('mahasiswa.index') }}">
                            <i class="bi bi-people"></i> Mahasiswa
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('matakuliah.index') }}">
                            <i class="bi bi-journal-bookmark"></i> Mata Kuliah
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal.index') }}">
                            <i class="bi bi-calendar"></i> Jadwal
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('krs.index') }}">
                            <i class="bi bi-clipboard-check"></i> KRS
                        </a>
                    </li>

                @else

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('jadwal.view') }}">
                            <i class="bi bi-calendar"></i> Jadwal
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('krs.my') }}">
                            <i class="bi bi-clipboard-check"></i> KRS Saya
                        </a>
                    </li>

                @endif

                {{-- LOGOUT --}}
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button class="btn btn-logout">
                            <i class="bi bi-box-arrow-right"></i> Logout
                        </button>
                    </form>
                </li>

            @endauth

        </ul>
    </div>
</div>


</nav>

<div class="container mt-4">

@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show">
        {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
@endif

@yield('content')


</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
