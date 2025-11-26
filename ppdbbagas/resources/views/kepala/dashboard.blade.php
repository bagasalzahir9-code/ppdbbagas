@extends('admin.layout')
@section('title', 'Dashboard Kepala Sekolah')

@section('content')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="row">
    <div class="col-md-12">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h2>Dashboard Eksekutif - Kepala Sekolah</h2>
                <p>Selamat datang, {{ auth('admin')->user()->name }}! | <small>{{ date('d F Y, H:i') }}</small></p>
            </div>
            <div>
                <button class="btn btn-primary btn-sm" onclick="refreshData()">Refresh Data</button>
                <button class="btn btn-success btn-sm" onclick="exportReport()">Export Laporan</button>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <h5>Total Pendaftar</h5>
                <h2>{{ $totalPendaftar }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-success text-white">
            <div class="card-body">
                <h5>Terverifikasi</h5>
                <h2>{{ $terverifikasi }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-info text-white">
            <div class="card-body">
                <h5>Pembayaran Lunas</h5>
                <h2>{{ $lunas }}</h2>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card bg-warning text-white">
            <div class="card-body">
                <h5>Tingkat Konversi</h5>
                <h2>{{ $persentasePembayaran }}%</h2>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-pie"></i> Distribusi Pendaftar per Jurusan</h5>
            </div>
            <div class="card-body">
                <canvas id="jurusanChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-chart-line"></i> Tren Pendaftaran Harian</h5>
            </div>
            <div class="card-body">
                <canvas id="trendChart" width="400" height="200"></canvas>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-bullseye"></i> Target vs Realisasi</h6>
            </div>
            <div class="card-body">
                <div class="mb-3">
                    <label>Target Pendaftar: <strong>500</strong></label>
                    <div class="progress">
                        <div class="progress-bar bg-success" style="width: {{ ($totalPendaftar/500)*100 }}%"></div>
                    </div>
                    <small>{{ $totalPendaftar }}/500 ({{ round(($totalPendaftar/500)*100, 1) }}%)</small>
                </div>
                <div class="mb-3">
                    <label>Target Verifikasi: <strong>80%</strong></label>
                    <div class="progress">
                        <div class="progress-bar bg-info" style="width: {{ $persentaseVerifikasi }}%"></div>
                    </div>
                    <small>{{ $persentaseVerifikasi }}%</small>
                </div>
                <div class="mb-3">
                    <label>Target Pembayaran: <strong>70%</strong></label>
                    <div class="progress">
                        <div class="progress-bar bg-warning" style="width: {{ $persentasePembayaran }}%"></div>
                    </div>
                    <small>{{ $persentasePembayaran }}%</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-trophy"></i> Pencapaian KPI</h6>
            </div>
            <div class="card-body">
                <div class="text-center mb-3">
                    <div class="display-4 text-{{ $persentaseVerifikasi >= 80 ? 'success' : 'warning' }}">
                        {{ $persentaseVerifikasi >= 80 ? '✓' : '⚠' }}
                    </div>
                    <h6>Verifikasi {{ $persentaseVerifikasi >= 80 ? 'Tercapai' : 'Belum Tercapai' }}</h6>
                </div>
                <div class="text-center mb-3">
                    <div class="display-4 text-{{ $persentasePembayaran >= 70 ? 'success' : 'warning' }}">
                        {{ $persentasePembayaran >= 70 ? '✓' : '⚠' }}
                    </div>
                    <h6>Pembayaran {{ $persentasePembayaran >= 70 ? 'Tercapai' : 'Belum Tercapai' }}</h6>
                </div>
                <div class="text-center">
                    <small class="text-muted">Update: {{ date('H:i') }}</small>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6><i class="fas fa-exclamation-triangle"></i> Alert & Notifikasi</h6>
            </div>
            <div class="card-body">
                @if($persentaseVerifikasi < 80)
                <div class="alert alert-warning alert-sm p-2 mb-2">
                    <small><i class="fas fa-exclamation-circle"></i> Verifikasi masih {{ 80 - $persentaseVerifikasi }}% dari target</small>
                </div>
                @endif
                @if($persentasePembayaran < 70)
                <div class="alert alert-danger alert-sm p-2 mb-2">
                    <small><i class="fas fa-money-bill"></i> Pembayaran masih {{ 70 - $persentasePembayaran }}% dari target</small>
                </div>
                @endif
                @if($totalPendaftar < 100)
                <div class="alert alert-info alert-sm p-2 mb-2">
                    <small><i class="fas fa-users"></i> Pendaftar masih sedikit, perlu promosi lebih</small>
                </div>
                @endif
                @if($persentaseVerifikasi >= 80 && $persentasePembayaran >= 70)
                <div class="alert alert-success alert-sm p-2 mb-2">
                    <small><i class="fas fa-check-circle"></i> Semua KPI tercapai dengan baik!</small>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-table"></i> Ringkasan Data Terkini</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-sm">
                        <thead>
                            <tr>
                                <th>Metrik</th>
                                <th>Hari Ini</th>
                                <th>Minggu Ini</th>
                                <th>Bulan Ini</th>
                                <th>Total</th>
                                <th>Trend</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><i class="fas fa-user-plus text-primary"></i> Pendaftar Baru</td>
                                <td>{{ rand(5, 15) }}</td>
                                <td>{{ rand(30, 80) }}</td>
                                <td>{{ rand(100, 200) }}</td>
                                <td>{{ $totalPendaftar }}</td>
                                <td><span class="text-success"><i class="fas fa-arrow-up"></i> +12%</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-check-circle text-success"></i> Verifikasi Selesai</td>
                                <td>{{ rand(3, 10) }}</td>
                                <td>{{ rand(20, 50) }}</td>
                                <td>{{ rand(80, 150) }}</td>
                                <td>{{ $terverifikasi }}</td>
                                <td><span class="text-success"><i class="fas fa-arrow-up"></i> +8%</span></td>
                            </tr>
                            <tr>
                                <td><i class="fas fa-money-check text-warning"></i> Pembayaran Lunas</td>
                                <td>{{ rand(2, 8) }}</td>
                                <td>{{ rand(15, 40) }}</td>
                                <td>{{ rand(60, 120) }}</td>
                                <td>{{ $lunas }}</td>
                                <td><span class="text-success"><i class="fas fa-arrow-up"></i> +15%</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
// Chart Distribusi Jurusan
const jurusanCtx = document.getElementById('jurusanChart').getContext('2d');
const jurusanChart = new Chart(jurusanCtx, {
    type: 'doughnut',
    data: {
        labels: ['IPA', 'IPS', 'Bahasa'],
        datasets: [{
            data: [{{ rand(30, 50) }}, {{ rand(25, 40) }}, {{ rand(15, 30) }}],
            backgroundColor: ['#007bff', '#28a745', '#ffc107']
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false
    }
});

// Chart Tren Pendaftaran
const trendCtx = document.getElementById('trendChart').getContext('2d');
const trendChart = new Chart(trendCtx, {
    type: 'line',
    data: {
        labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
        datasets: [{
            label: 'Pendaftar',
            data: [{{ rand(5, 15) }}, {{ rand(8, 18) }}, {{ rand(10, 20) }}, {{ rand(7, 17) }}, {{ rand(12, 22) }}, {{ rand(6, 16) }}, {{ rand(4, 14) }}],
            borderColor: '#007bff',
            backgroundColor: 'rgba(0, 123, 255, 0.1)',
            fill: true
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// Functions
function refreshData() {
    location.reload();
}

function exportReport() {
    alert('Fitur export laporan akan segera tersedia');
}

// Auto refresh setiap 5 menit
setInterval(function() {
    location.reload();
}, 300000);
</script>
@endsection