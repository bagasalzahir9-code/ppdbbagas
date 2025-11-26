<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin SPMB - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin SPMB</a>
            @auth('admin')
            <div class="navbar-nav ms-auto">
                @if(auth('admin')->user()->role == 'admin')
                <a class="nav-link" href="{{ route('admin.dashboard') }}">Dashboard</a>
                @endif
                
                @if(auth('admin')->user()->role == 'verifikator')
                <a class="nav-link" href="{{ route('verifikator.dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('verifikator.verifikasi') }}">Verifikasi</a>
                @endif
                
                @if(auth('admin')->user()->role == 'keuangan')
                <a class="nav-link" href="{{ route('keuangan.dashboard') }}">Dashboard</a>
                <a class="nav-link" href="{{ route('keuangan.pembayaran') }}">Pembayaran</a>
                @endif
                
                @if(auth('admin')->user()->role == 'kepala_sekolah')
                <a class="nav-link" href="{{ route('kepala.dashboard') }}">Dashboard</a>
                @endif
                
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
            @endauth
        </div>
    </nav>

    <div class="container-fluid mt-4">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>