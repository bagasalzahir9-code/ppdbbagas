<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa - SMK BAKTI NUSANTARA 666</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: #0a0a0a;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(120, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 119, 198, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 40% 40%, rgba(120, 219, 255, 0.2) 0%, transparent 50%);
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: #ffffff;
            overflow-x: hidden;
        }
        
        .animated-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            background: linear-gradient(-45deg, #0a0a0a, #1a1a2e, #16213e, #0f3460);
            background-size: 400% 400%;
            animation: gradientShift 15s ease infinite;
        }
        
        @keyframes gradientShift {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes glow {
            0%, 100% { box-shadow: 0 0 20px rgba(120, 119, 198, 0.3); }
            50% { box-shadow: 0 0 40px rgba(120, 119, 198, 0.6), 0 0 60px rgba(255, 119, 198, 0.3); }
        }
        
        .navbar {
            background: rgba(10, 10, 10, 0.8) !important;
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(120, 119, 198, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.3);
        }
        
        .navbar-brand {
            background: linear-gradient(135deg, #7877c6, #ff77c6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 800;
            font-size: 1.5rem;
        }
        
        .welcome-section {
            background: rgba(10, 10, 10, 0.4);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 40px;
            margin-bottom: 40px;
            border: 1px solid rgba(120, 119, 198, 0.3);
            position: relative;
            overflow: hidden;
            animation: glow 4s ease-in-out infinite;
        }
        
        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(120, 119, 198, 0.1), transparent);
            animation: rotate 10s linear infinite;
        }
        
        @keyframes rotate {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .welcome-title {
            background: linear-gradient(135deg, #ffffff, #7877c6, #ff77c6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-size: 3rem;
            font-weight: 800;
            margin-bottom: 15px;
            position: relative;
            z-index: 2;
        }
        
        .welcome-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 1.2rem;
            font-weight: 300;
            position: relative;
            z-index: 2;
        }
        
        .status-card {
            background: rgba(10, 10, 10, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(120, 119, 198, 0.3);
            border-radius: 25px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
            animation: float 6s ease-in-out infinite;
        }
        
        .status-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(120, 119, 198, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .status-card:hover::before {
            left: 100%;
        }
        
        .status-card:hover {
            transform: translateY(-15px) scale(1.02);
            box-shadow: 0 30px 60px rgba(120, 119, 198, 0.4);
            border-color: rgba(255, 119, 198, 0.6);
        }
        
        .status-icon {
            width: 70px;
            height: 70px;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.8rem;
            color: white;
            margin-bottom: 20px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .status-icon::after {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            border-radius: 22px;
            background: linear-gradient(45deg, #7877c6, #ff77c6, #78dbff, #7877c6);
            z-index: -1;
            animation: rotate 3s linear infinite;
        }
        
        .status-icon.primary { background: linear-gradient(135deg, #7877c6, #5a67d8); }
        .status-icon.success { background: linear-gradient(135deg, #48bb78, #38a169); }
        .status-icon.warning { background: linear-gradient(135deg, #ed8936, #dd6b20); }
        .status-icon.info { background: linear-gradient(135deg, #4299e1, #3182ce); }
        
        .status-card:hover .status-icon {
            transform: scale(1.1) rotate(5deg);
        }
        
        .menu-card {
            background: rgba(10, 10, 10, 0.5);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(120, 119, 198, 0.2);
            border-radius: 25px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.2);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            height: 100%;
            overflow: hidden;
            position: relative;
        }
        
        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(120, 119, 198, 0.1), rgba(255, 119, 198, 0.1));
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .menu-card:hover::before {
            opacity: 1;
        }
        
        .menu-card:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 25px 50px rgba(120, 119, 198, 0.3);
            border-color: rgba(255, 119, 198, 0.5);
        }
        
        .menu-icon {
            width: 90px;
            height: 90px;
            border-radius: 25px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            color: white;
            margin: 0 auto 25px;
            position: relative;
            transition: all 0.3s ease;
        }
        
        .menu-icon::before {
            content: '';
            position: absolute;
            top: -3px;
            left: -3px;
            right: -3px;
            bottom: -3px;
            border-radius: 28px;
            background: linear-gradient(45deg, #7877c6, #ff77c6, #78dbff);
            z-index: -1;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        
        .menu-card:hover .menu-icon::before {
            opacity: 1;
            animation: rotate 2s linear infinite;
        }
        
        .menu-card:hover .menu-icon {
            transform: scale(1.1);
        }
        
        .btn-gradient {
            background: linear-gradient(135deg, #7877c6, #ff77c6);
            border: none;
            border-radius: 30px;
            padding: 12px 30px;
            color: white;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .btn-gradient::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s;
        }
        
        .btn-gradient:hover::before {
            left: 100%;
        }
        
        .btn-gradient:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 30px rgba(120, 119, 198, 0.4);
            color: white;
        }
        
        .progress-section {
            background: rgba(10, 10, 10, 0.4);
            backdrop-filter: blur(20px);
            border-radius: 30px;
            padding: 35px;
            margin-top: 40px;
            border: 1px solid rgba(120, 119, 198, 0.3);
            position: relative;
            overflow: hidden;
        }
        
        .progress-section::before {
            content: '';
            position: absolute;
            top: -2px;
            left: -2px;
            right: -2px;
            bottom: -2px;
            background: linear-gradient(45deg, #7877c6, #ff77c6, #78dbff, #7877c6);
            border-radius: 32px;
            z-index: -1;
            animation: rotate 8s linear infinite;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #7877c6, #ff77c6, #78dbff);
            border-radius: 15px;
            height: 12px;
            position: relative;
            overflow: hidden;
        }
        
        .progress-bar::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { left: -100%; }
            100% { left: 100%; }
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0.7);
            }
            70% {
                box-shadow: 0 0 0 10px rgba(40, 167, 69, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(40, 167, 69, 0);
            }
        }
        
        .progress {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            height: 12px;
        }
        
        .card-body h5, .card-body h6 {
            color: #ffffff;
        }
        
        .text-muted {
            color: rgba(255, 255, 255, 0.7) !important;
        }
    </style>
</head>
<body>
    <div class="animated-bg"></div>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <i class="fas fa-graduation-cap me-2"></i>SMK BAKTI NUSANTARA 666
            </a>
            <div class="navbar-nav ms-auto">
                <form action="{{ route('spmb.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm rounded-pill px-3">
                        <i class="fas fa-sign-out-alt me-1"></i>Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Welcome Section -->
        <div class="welcome-section text-center">
            <h1 class="welcome-title">Selamat Datang!</h1>
            <p class="welcome-subtitle">{{ auth('calon_siswa')->user()->nama_lengkap ?? 'Calon Siswa' }}</p>
            
            @php $user = auth('calon_siswa')->user(); @endphp
            @if($user->status == 'lulus')
                <div class="alert alert-success mt-4 mx-auto" style="max-width: 600px; background: linear-gradient(135deg, #28a745, #20c997); border: none; animation: pulse 2s infinite;">
                    <h4 class="text-white mb-2">
                        <i class="fas fa-trophy me-2" style="color: #ffd700;"></i>
                        🎉 SELAMAT! ANDA DITERIMA! 🎉
                    </h4>
                    <p class="text-white mb-0">Anda telah diterima di <strong>{{ $user->jurusan_pilihan ?? 'SMK BAKTI NUSANTARA 666' }}</strong></p>
                    <a href="{{ route('spmb.notifikasi') }}" class="btn btn-light btn-sm mt-2">
                        <i class="fas fa-info-circle"></i> Lihat Detail
                    </a>
                </div>
            @elseif($user->status == 'tidak_lulus')
                <div class="alert alert-danger mt-4 mx-auto" style="max-width: 600px; border: none;">
                    <h5 class="text-white mb-2">
                        <i class="fas fa-times-circle me-2"></i>
                        Hasil Seleksi
                    </h5>
                    <p class="text-white mb-0">Mohon maaf, Anda belum berhasil dalam seleksi kali ini.</p>
                    <a href="{{ route('spmb.notifikasi') }}" class="btn btn-light btn-sm mt-2">
                        <i class="fas fa-info-circle"></i> Lihat Detail
                    </a>
                </div>
            @elseif($user->status == 'cadangan')
                <div class="alert alert-warning mt-4 mx-auto" style="max-width: 600px; background: linear-gradient(135deg, #ffc107, #fd7e14); border: none;">
                    <h5 class="text-white mb-2">
                        <i class="fas fa-list-ol me-2"></i>
                        Daftar Cadangan
                    </h5>
                    <p class="text-white mb-0">Anda masuk dalam daftar cadangan. Pantau terus untuk update!</p>
                    <a href="{{ route('spmb.notifikasi') }}" class="btn btn-light btn-sm mt-2">
                        <i class="fas fa-info-circle"></i> Lihat Detail
                    </a>
                </div>
            @endif
        </div>

        <!-- Status Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="status-card">
                    <div class="card-body text-center">
                        <div class="status-icon primary mx-auto">
                            <i class="fas fa-user-check"></i>
                        </div>
                        <h6 class="text-muted mb-1">Status Pendaftaran</h6>
                        <h5 class="fw-bold">{{ auth('calon_siswa')->user()->status_label ?? 'Draft' }}</h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="status-card">
                    <div class="card-body text-center">
                        <div class="status-icon info mx-auto">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                        <h6 class="text-muted mb-1">Status Verifikasi</h6>
                        <h5 class="fw-bold">
                            @if(in_array(auth('calon_siswa')->user()->status, ['verifikasi_admin', 'menunggu_pembayaran', 'terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan']))
                                Terverifikasi
                            @else
                                Pending
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="status-card">
                    <div class="card-body text-center">
                        <div class="status-icon warning mx-auto">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h6 class="text-muted mb-1">Status Pembayaran</h6>
                        <h5 class="fw-bold">
                            @if(auth('calon_siswa')->user()->bukti_pembayaran)
                                @if(in_array(auth('calon_siswa')->user()->status, ['terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan']))
                                    Terbayar
                                @else
                                    Menunggu Verifikasi
                                @endif
                            @else
                                Belum Bayar
                            @endif
                        </h5>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="status-card">
                    <div class="card-body text-center">
                        <div class="status-icon success mx-auto">
                            <i class="fas fa-graduation-cap"></i>
                        </div>
                        <h6 class="text-muted mb-1">Jurusan Pilihan</h6>
                        <h5 class="fw-bold">{{ auth('calon_siswa')->user()->jurusan_pilihan ?? 'Belum Pilih' }}</h5>
                    </div>
                </div>
            </div>
        </div>

        <!-- Menu Cards -->
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="menu-card">
                    <div class="card-body text-center p-4">
                        <div class="menu-icon primary mx-auto">
                            <i class="fas fa-user-edit"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Formulir Pendaftaran</h5>
                        <p class="text-muted mb-3">Lengkapi data diri, orang tua, dan pilih jurusan</p>
                        <a href="{{ route('spmb.formulir') }}" class="btn btn-gradient">Isi Formulir</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="menu-card">
                    <div class="card-body text-center p-4">
                        <div class="menu-icon success mx-auto">
                            <i class="fas fa-upload"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Upload Berkas</h5>
                        <p class="text-muted mb-3">Upload ijazah, rapor, KK, akta kelahiran</p>
                        <a href="{{ route('spmb.upload') }}" class="btn btn-gradient">Upload Berkas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="menu-card">
                    <div class="card-body text-center p-4">
                        <div class="menu-icon warning mx-auto">
                            <i class="fas fa-credit-card"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Pembayaran</h5>
                        <p class="text-muted mb-3">Lihat tagihan dan upload bukti pembayaran</p>
                        <a href="{{ route('spmb.pembayaran') }}" class="btn btn-gradient">Bayar</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="menu-card">
                    <div class="card-body text-center p-4">
                        <div class="menu-icon info mx-auto">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Status Pendaftaran</h5>
                        <p class="text-muted mb-3">Pantau progress pendaftaran Anda</p>
                        <a href="{{ route('spmb.status') }}" class="btn btn-gradient">Lihat Status</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="menu-card">
                    <div class="card-body text-center p-4">
                        <div class="menu-icon primary mx-auto">
                            <i class="fas fa-print"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Cetak Kartu</h5>
                        <p class="text-muted mb-3">Cetak kartu pendaftaran dan bukti pembayaran</p>
                        <a href="{{ route('spmb.cetak') }}" class="btn btn-gradient">Cetak</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="menu-card">
                    <div class="card-body text-center p-4">
                        <div class="menu-icon warning mx-auto">
                            <i class="fas fa-bell"></i>
                        </div>
                        <h5 class="fw-bold mb-2">Notifikasi</h5>
                        <p class="text-muted mb-3">Lihat pemberitahuan terkait pendaftaran</p>
                        <a href="{{ route('spmb.notifikasi') }}" class="btn btn-gradient">Notifikasi</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Progress Section -->
        @php
            $user = auth('calon_siswa')->user();
            $steps = [
                'formulir' => $user->nama_lengkap && $user->jurusan_pilihan,
                'berkas' => $user->hasUploadedAllRequiredFiles(),
                'pembayaran' => $user->bukti_pembayaran,
                'verifikasi' => in_array($user->status, ['terbayar', 'verifikasi_keuangan', 'lulus', 'tidak_lulus', 'cadangan']),
                'hasil' => in_array($user->status, ['lulus', 'tidak_lulus', 'cadangan'])
            ];
            $completedSteps = count(array_filter($steps));
            $totalSteps = count($steps);
            $percentage = ($completedSteps / $totalSteps) * 100;
        @endphp
        <div class="progress-section">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <h5 class="text-white mb-2">Progress Pendaftaran</h5>
                    <p class="text-white-50 mb-3">Selesaikan semua tahap untuk menyelesaikan pendaftaran</p>
                    <div class="progress mb-2">
                        <div class="progress-bar" style="width: {{ $percentage }}%"></div>
                    </div>
                    <small class="text-white-50">{{ $completedSteps }} dari {{ $totalSteps }} tahap selesai</small>
                </div>
                <div class="col-md-4 text-center">
                    <div class="text-white">
                        <i class="fas fa-trophy fa-3x mb-2 opacity-75"></i>
                        <h6>{{ round($percentage) }}% Selesai</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>