<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Keuangan - PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar {
            background: rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(10px);
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            backdrop-filter: blur(10px);
            background: rgba(255, 255, 255, 0.95);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }
        
        .stats-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
        }
        
        .stats-card.success {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
        }
        
        .stats-card.warning {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
        }
        
        .stats-card.info {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
        }
        
        .text-white-50 {
            color: rgba(255, 255, 255, 0.7) !important;
        }
        
        .text-success {
            color: #38ef7d !important;
        }
        
        .text-info {
            color: #00f2fe !important;
        }
        
        .text-warning {
            color: #f5576c !important;
        }
        
        .stats-icon {
            opacity: 0.8;
            font-size: 2.5rem;
        }
        
        .progress {
            background: rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }
        
        .progress-bar {
            background: linear-gradient(90deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
        }
        
        .payment-item {
            border-radius: 10px;
            transition: background 0.3s ease;
        }
        
        .payment-item:hover {
            background: rgba(102, 126, 234, 0.1);
        }
        
        .badge {
            border-radius: 20px;
            padding: 5px 12px;
        }
        
        .btn {
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .card-header {
            background: transparent;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            font-weight: 600;
        }
        
        .analytics-icon {
            width: 60px;
            height: 60px;
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .stats-card.analytics {
            background: linear-gradient(135deg, rgba(102, 126, 234, 0.9), rgba(118, 75, 162, 0.9));
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        
        canvas {
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('keuangan.dashboard') }}">Dashboard Keuangan PPDB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keuangan.dashboard') }}">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('keuangan.pembayaran') }}">
                            <i class="fas fa-credit-card"></i> Verifikasi Bayar
                        </a>
                    </li>
                </ul>
                <div class="navbar-nav">
                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button class="btn btn-outline-light btn-sm">
                            <i class="fas fa-sign-out-alt"></i> Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Statistik Cards -->
        <div class="row mb-4">
            <div class="col-md-3 mb-3">
                <div class="card stats-card success">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2 opacity-75">Total Pendapatan</h6>
                                <h3 class="mb-0 fw-bold">Rp {{ number_format($totalPendapatan ?? 0, 0, ',', '.') }}</h3>
                            </div>
                            <i class="fas fa-money-bill-wave stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card stats-card warning">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2 opacity-75">Pending</h6>
                                <h3 class="mb-0 fw-bold">Rp {{ number_format($totalPending ?? 0, 0, ',', '.') }}</h3>
                            </div>
                            <i class="fas fa-clock stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card stats-card info">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2 opacity-75">Siswa Lunas</h6>
                                <h3 class="mb-0 fw-bold">{{ $siswaLunas ?? 0 }}/{{ $totalSiswa ?? 0 }}</h3>
                            </div>
                            <i class="fas fa-users stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-3">
                <div class="card stats-card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center">
                            <div>
                                <h6 class="card-title mb-2 opacity-75">Bulan Ini</h6>
                                <h3 class="mb-0 fw-bold">Rp {{ number_format($pendapatanBulan ?? 0, 0, ',', '.') }}</h3>
                            </div>
                            <i class="fas fa-calendar stats-icon"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Statistik Jenis Pembayaran -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Statistik Jenis Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        @foreach($statistikJenis as $stat)
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-capitalize">{{ $stat->jurusan_pilihan ?? 'Umum' }}</span>
                            <strong>Rp {{ number_format($stat->total, 0, ',', '.') }}</strong>
                        </div>
                        <div class="progress mb-3" style="height: 10px;">
                            <div class="progress-bar" style="width: {{ $totalPendapatan > 0 ? ($stat->total / $totalPendapatan) * 100 : 0 }}%"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Pembayaran Terbaru -->
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h5>Pembayaran Terbaru</h5>
                        <a href="{{ route('keuangan.pembayaran') }}" class="btn btn-sm btn-primary">Lihat Semua</a>
                    </div>
                    <div class="card-body">
                        @forelse($pembayaranTerbaru ?? [] as $bayar)
                        <div class="payment-item d-flex justify-content-between align-items-center mb-3 p-3">
                            <div class="d-flex align-items-center">
                                <div class="me-3">
                                    <div class="bg-primary rounded-circle d-flex align-items-center justify-content-center" style="width: 40px; height: 40px;">
                                        <i class="fas fa-user text-white"></i>
                                    </div>
                                </div>
                                <div>
                                    <strong class="d-block">{{ $bayar->nama_lengkap ?? 'Siswa Test' }}</strong>
                                    <small class="text-muted">{{ $bayar->jurusan_pilihan ?? 'Pendaftaran' }}</small>
                                </div>
                            </div>
                            <div class="text-end">
                                <div class="fw-bold text-success">Rp {{ number_format($bayar->nominal_pembayaran ?? 500000, 0, ',', '.') }}</div>
                                <span class="badge bg-{{ in_array($bayar->status, ['terbayar', 'verifikasi_keuangan', 'lulus']) ? 'success' : ($bayar->status == 'menunggu_pembayaran' ? 'warning' : 'danger') }}">
                                    {{ $bayar->status_label ?? 'Pending' }}
                                </span>
                            </div>
                        </div>
                        @empty
                        <div class="text-center py-4">
                            <i class="fas fa-receipt fa-3x text-muted mb-3"></i>
                            <p class="text-muted">Belum ada pembayaran terbaru</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Charts Section -->
        <div class="row mt-4">
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-chart-line me-2"></i>Trend Pendapatan</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="revenueChart" height="200"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card">
                    <div class="card-header">
                        <h5><i class="fas fa-chart-pie me-2"></i>Distribusi Pembayaran</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="paymentChart" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Analytics Cards -->
        <div class="row mt-4">
            <div class="col-md-4 mb-3">
                <div class="card stats-card analytics">
                    <div class="card-body text-center">
                        <div class="analytics-icon mx-auto mb-3">
                            <i class="fas fa-trending-up"></i>
                        </div>
                        <h6 class="text-white-50">Growth Rate</h6>
                        <h3 class="text-white fw-bold">+15.3%</h3>
                        <small class="text-success"><i class="fas fa-arrow-up"></i> vs bulan lalu</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stats-card analytics">
                    <div class="card-body text-center">
                        <div class="analytics-icon mx-auto mb-3">
                            <i class="fas fa-chart-bar"></i>
                        </div>
                        <h6 class="text-white-50">Avg. Payment</h6>
                        <h3 class="text-white fw-bold">Rp 750K</h3>
                        <small class="text-info"><i class="fas fa-equals"></i> rata-rata</small>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="card stats-card analytics">
                    <div class="card-body text-center">
                        <div class="analytics-icon mx-auto mb-3">
                            <i class="fas fa-clock"></i>
                        </div>
                        <h6 class="text-white-50">Processing Time</h6>
                        <h3 class="text-white fw-bold">2.4 hari</h3>
                        <small class="text-warning"><i class="fas fa-arrow-down"></i> lebih cepat</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        // Revenue Trend Chart
        const revenueCtx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(revenueCtx, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun'],
                datasets: [{
                    label: 'Pendapatan (Juta Rp)',
                    data: [12, 19, 15, 25, 22, 30],
                    borderColor: '#667eea',
                    backgroundColor: 'rgba(102, 126, 234, 0.1)',
                    borderWidth: 3,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#764ba2',
                    pointBorderColor: '#ffffff',
                    pointBorderWidth: 2,
                    pointRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    },
                    x: {
                        grid: {
                            color: 'rgba(0, 0, 0, 0.1)'
                        }
                    }
                }
            }
        });

        // Payment Distribution Chart
        const paymentCtx = document.getElementById('paymentChart').getContext('2d');
        const paymentChart = new Chart(paymentCtx, {
            type: 'doughnut',
            data: {
                labels: ['Pendaftaran', 'SPP', 'Seragam', 'Buku'],
                datasets: [{
                    data: [40, 30, 20, 10],
                    backgroundColor: [
                        '#667eea',
                        '#764ba2',
                        '#11998e',
                        '#f093fb'
                    ],
                    borderWidth: 0,
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            padding: 20,
                            usePointStyle: true
                        }
                    }
                }
            }
        });

        // Add animation to charts
        setTimeout(() => {
            revenueChart.update('active');
            paymentChart.update('active');
        }, 500);
    </script>
</body>
</html>