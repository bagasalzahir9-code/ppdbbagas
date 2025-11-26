@extends('admin.layout')
@section('title', 'Dashboard Eksekutif')

@section('content')
<div class="dashboard-eksekutif">
    <div class="header-section">
        <h1><i class="fas fa-chart-line"></i> Dashboard Eksekutif</h1>
        <p>Monitoring KPI dan Analisis Real-time PPDB</p>
    </div>

    <!-- KPI Cards -->
    <div class="kpi-grid">
        <div class="kpi-card primary">
            <div class="kpi-icon"><i class="fas fa-users"></i></div>
            <div class="kpi-content">
                <h3>{{ $kpi['total_pendaftar'] }}</h3>
                <p>Total Pendaftar</p>
                <small>+{{ $kpi['total_pendaftar'] - ($kpi['ditolak'] ?? 0) }} dari target</small>
            </div>
        </div>
        
        <div class="kpi-card success">
            <div class="kpi-icon"><i class="fas fa-check-circle"></i></div>
            <div class="kpi-content">
                <h3>{{ $kpi['diterima'] }}</h3>
                <p>Diterima</p>
                <small>{{ $kpi['total_pendaftar'] > 0 ? round(($kpi['diterima'] / $kpi['total_pendaftar']) * 100, 1) : 0 }}% dari total</small>
            </div>
        </div>
        
        <div class="kpi-card info">
            <div class="kpi-icon"><i class="fas fa-credit-card"></i></div>
            <div class="kpi-content">
                <h3>{{ $kpi['sudah_bayar'] }}</h3>
                <p>Sudah Bayar</p>
                <small>{{ $kpi['total_pendaftar'] > 0 ? round(($kpi['sudah_bayar'] / $kpi['total_pendaftar']) * 100, 1) : 0 }}% conversion</small>
            </div>
        </div>
        
        <div class="kpi-card warning">
            <div class="kpi-icon"><i class="fas fa-clock"></i></div>
            <div class="kpi-content">
                <h3>{{ $kpi['cadangan'] }}</h3>
                <p>Cadangan</p>
                <small>Waiting list</small>
            </div>
        </div>
    </div>

    <!-- Charts Section -->
    <div class="charts-section">
        <div class="chart-container">
            <div class="chart-header">
                <h3><i class="fas fa-chart-area"></i> Tren Pendaftaran Harian</h3>
            </div>
            <canvas id="trenChart" width="400" height="200"></canvas>
        </div>
        
        <div class="chart-container">
            <div class="chart-header">
                <h3><i class="fas fa-chart-pie"></i> Distribusi per Jurusan</h3>
            </div>
            <canvas id="jurusanChart" width="400" height="200"></canvas>
        </div>
    </div>

    <!-- Map Section -->
    <div class="map-section">
        <div class="map-header">
            <h3><i class="fas fa-map-marked-alt"></i> Sebaran Geografis Pendaftar</h3>
        </div>
        <div id="sebaranMap" style="height: 400px; background: #f8f9fa; border-radius: 10px; display: flex; align-items: center; justify-content: center;">
            <p>Peta Sebaran Pendaftar (Integrasi dengan Google Maps/Leaflet)</p>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
// Tren Chart
const trenCtx = document.getElementById('trenChart').getContext('2d');
new Chart(trenCtx, {
    type: 'line',
    data: {
        labels: {!! json_encode($tren_harian->pluck('tanggal')) !!},
        datasets: [{
            label: 'Pendaftar per Hari',
            data: {!! json_encode($tren_harian->pluck('jumlah')) !!},
            borderColor: '#00ff92',
            backgroundColor: 'rgba(0, 255, 146, 0.1)',
            tension: 0.4
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});

// Jurusan Chart
const jurusanCtx = document.getElementById('jurusanChart').getContext('2d');
new Chart(jurusanCtx, {
    type: 'doughnut',
    data: {
        labels: {!! json_encode($per_jurusan->pluck('jurusan.nama_jurusan')) !!},
        datasets: [{
            data: {!! json_encode($per_jurusan->pluck('jumlah')) !!},
            backgroundColor: ['#00ff92', '#0070f3', '#ff0080', '#ffa500', '#8a2be2']
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: { position: 'bottom' }
        }
    }
});
</script>

<style>
.dashboard-eksekutif {
    padding: 20px;
}

.header-section {
    margin-bottom: 30px;
}

.kpi-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 20px;
    margin-bottom: 30px;
}

.kpi-card {
    background: rgba(15, 15, 35, 0.6);
    border-radius: 15px;
    padding: 25px;
    display: flex;
    align-items: center;
    gap: 20px;
    border-left: 4px solid;
}

.kpi-card.primary { border-color: #00ff92; }
.kpi-card.success { border-color: #28a745; }
.kpi-card.info { border-color: #0070f3; }
.kpi-card.warning { border-color: #ffa500; }

.kpi-icon {
    font-size: 2.5rem;
    opacity: 0.8;
}

.kpi-content h3 {
    font-size: 2rem;
    font-weight: bold;
    margin: 0;
}

.charts-section {
    display: grid;
    grid-template-columns: 2fr 1fr;
    gap: 20px;
    margin-bottom: 30px;
}

.chart-container, .map-section {
    background: rgba(15, 15, 35, 0.6);
    border-radius: 15px;
    padding: 20px;
}

.chart-header, .map-header {
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}
</style>
@endsection