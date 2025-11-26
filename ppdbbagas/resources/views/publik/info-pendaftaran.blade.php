<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Pendaftaran - SPMB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">SPMB Sekolah ABC</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link" href="{{ route('spmb.login') }}">Login</a>
                <a class="nav-link" href="{{ route('spmb.register') }}">Daftar</a>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <h2>Informasi Pendaftaran</h2>
                <p>Melihat info pendaftaran & mengakses link registrasi</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h5>Jurusan Tersedia</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach($jurusan as $j)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <h6>{{ $j->nama_jurusan }}</h6>
                                        <p class="text-muted">Kuota: {{ $j->kuota }}</p>
                                        <span class="badge bg-{{ $j->aktif ? 'success' : 'danger' }}">
                                            {{ $j->aktif ? 'Buka' : 'Tutup' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Statistik</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Total Pendaftar:</strong> {{ $total_pendaftar }}</p>
                        <p><strong>Status:</strong> <span class="badge bg-success">Buka</span></p>
                        
                        <hr>
                        
                        <div class="d-grid gap-2">
                            <a href="{{ route('spmb.register') }}" class="btn btn-primary">
                                Daftar Sekarang
                            </a>
                            <a href="{{ route('spmb.login') }}" class="btn btn-outline-primary">
                                Login
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>