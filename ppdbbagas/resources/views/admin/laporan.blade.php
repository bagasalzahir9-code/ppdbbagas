<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan PPDB - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f0f23;
            color: #ffffff;
            min-height: 100vh;
        }

        .sidebar {
            position: fixed;
            left: 0;
            top: 0;
            width: 280px;
            height: 100vh;
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border-right: 1px solid rgba(255, 255, 255, 0.1);
            padding: 30px 0;
            z-index: 1000;
        }

        .logo-section {
            text-align: center;
            padding: 0 30px 40px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border-radius: 15px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
        }

        .logo-text {
            font-size: 1.2rem;
            font-weight: 700;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-menu {
            padding: 30px 0;
        }

        .nav-item {
            margin: 5px 20px;
        }

        .nav-link {
            display: flex;
            align-items: center;
            padding: 15px 20px;
            color: rgba(255, 255, 255, 0.7);
            text-decoration: none;
            border-radius: 12px;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(0, 255, 146, 0.1);
            color: #00ff92;
            transform: translateX(5px);
        }

        .nav-link i {
            width: 20px;
            margin-right: 15px;
            font-size: 1.1rem;
        }

        .main-content {
            margin-left: 280px;
            padding: 30px;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 40px;
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            padding: 20px 30px;
            border-radius: 20px;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .page-subtitle {
            color: rgba(255, 255, 255, 0.6);
        }

        .content-grid {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 30px;
        }

        .filter-panel {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            height: fit-content;
        }

        .filter-title {
            font-size: 1.3rem;
            font-weight: 600;
            margin-bottom: 25px;
            color: #00ff92;
        }

        .filter-group {
            margin-bottom: 20px;
        }

        .filter-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 500;
            color: rgba(255, 255, 255, 0.8);
        }

        .filter-select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            color: white;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .filter-select:focus {
            outline: none;
            border-color: #00ff92;
            box-shadow: 0 0 0 2px rgba(0, 255, 146, 0.2);
        }

        .filter-select option {
            background: #0f0f23;
            color: white;
            padding: 10px;
        }

        .generate-btn {
            width: 100%;
            padding: 15px;
            background: linear-gradient(135deg, #00ff92, #0070f3);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .generate-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 255, 146, 0.3);
        }

        .report-panel {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
        }

        .report-header {
            padding: 25px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .report-title {
            font-size: 1.3rem;
            font-weight: 600;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            padding: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .stat-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .chart-section {
            padding: 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .chart-container {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
        }

        .chart-card {
            background: rgba(255, 255, 255, 0.05);
            border-radius: 15px;
            padding: 20px;
        }

        .chart-title {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 15px;
            text-align: center;
        }

        .table-section {
            padding: 30px;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: rgba(0, 255, 146, 0.1);
            padding: 15px;
            text-align: left;
            font-weight: 600;
            color: #00ff92;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table td {
            padding: 15px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.05);
        }

        .table tr:hover {
            background: rgba(255, 255, 255, 0.02);
        }

        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }

        .status-pending {
            background: rgba(255, 193, 7, 0.2);
            color: #ffc107;
        }

        .status-verified {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
        }

        .download-section {
            padding: 30px;
            display: flex;
            gap: 15px;
            justify-content: center;
        }

        .download-btn {
            padding: 12px 25px;
            border: none;
            border-radius: 10px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .btn-excel {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .btn-pdf {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .btn-csv {
            background: rgba(0, 112, 243, 0.2);
            color: #0070f3;
            border: 1px solid rgba(0, 112, 243, 0.3);
        }

        .download-btn:hover {
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .content-grid {
                grid-template-columns: 1fr;
            }
            
            .chart-container {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-section">
            <div class="logo-icon">
                <i class="fas fa-graduation-cap"></i>
            </div>
            <div class="logo-text">SMK BAKTI NUSANTARA 666</div>
        </div>
        
        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.master') }}" class="nav-link">
                    <i class="fas fa-database"></i>
                    Master Data
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.monitoring') }}" class="nav-link">
                    <i class="fas fa-users"></i>
                    Monitoring
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.peta') }}" class="nav-link">
                    <i class="fas fa-map"></i>
                    Peta Sebaran
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('admin.laporan') }}" class="nav-link active">
                    <i class="fas fa-chart-bar"></i>
                    Laporan
                </a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1 class="page-title">Laporan PPDB</h1>
                <p class="page-subtitle">Generate dan analisis laporan pendaftaran dalam berbagai format</p>
            </div>
        </div>

        <div class="content-grid">
            <div class="filter-panel">
                <h3 class="filter-title"><i class="fas fa-filter"></i> Filter Laporan</h3>
                
                <div class="filter-group">
                    <label class="filter-label">Jenis Laporan</label>
                    <select class="filter-select" id="reportType">
                        <option value="pendaftar">Laporan Pendaftar</option>
                        <option value="keuangan">Laporan Keuangan</option>
                        <option value="verifikasi">Laporan Verifikasi</option>
                        <option value="sebaran">Laporan Sebaran</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Periode</label>
                    <select class="filter-select" id="period">
                        <option value="all">Semua Periode</option>
                        <option value="gel1">Gelombang 1</option>
                        <option value="gel2">Gelombang 2</option>
                        <option value="gel3">Gelombang 3</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Jurusan</label>
                    <select class="filter-select" id="major">
                        <option value="all">Semua Jurusan</option>
                        <option value="PPLG">PPLG</option>
                        <option value="DKV">DKV</option>
                        <option value="ANIMASI">ANIMASI</option>
                        <option value="BDP">BDP</option>
                        <option value="AKUNTANSI">AKUNTANSI</option>
                    </select>
                </div>
                
                <div class="filter-group">
                    <label class="filter-label">Status</label>
                    <select class="filter-select" id="status">
                        <option value="all">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="verified">Terverifikasi</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
                
                <button class="generate-btn" onclick="generateReport()">
                    <i class="fas fa-chart-line"></i> Generate Laporan
                </button>
            </div>

            <div class="report-panel">
                <div class="report-header">
                    <h3 class="report-title">Laporan Pendaftar PPDB 2024</h3>
                    <span style="color: rgba(255, 255, 255, 0.6); font-size: 0.9rem;">{{ date('d M Y H:i') }}</span>
                </div>

                <div class="stats-grid">
                    <div class="stat-card">
                        <div class="stat-value">{{ count($pendaftar ?? []) }}</div>
                        <div class="stat-label">Total Pendaftar</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'verified')->count() }}</div>
                        <div class="stat-label">Terverifikasi</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'pending')->count() }}</div>
                        <div class="stat-label">Pending</div>
                    </div>
                    <div class="stat-card">
                        <div class="stat-value">5</div>
                        <div class="stat-label">Jurusan</div>
                    </div>
                </div>

                <div class="chart-section">
                    <div class="chart-container">
                        <div class="chart-card">
                            <h4 class="chart-title">Pendaftar per Jurusan</h4>
                            <canvas id="majorChart" width="300" height="200"></canvas>
                        </div>
                        <div class="chart-card">
                            <h4 class="chart-title">Status Verifikasi</h4>
                            <canvas id="statusChart" width="300" height="200"></canvas>
                        </div>
                    </div>
                </div>

                <div class="table-section">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Lengkap</th>
                                <th>Email</th>
                                <th>Jurusan</th>
                                <th>Status</th>
                                <th>Tanggal Daftar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pendaftar ?? [] as $index => $siswa)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $siswa->nama_lengkap }}</td>
                                <td>{{ $siswa->email }}</td>
                                <td>{{ $siswa->jurusan_pilihan ?? 'Belum Pilih' }}</td>
                                <td>
                                    <span class="status-badge status-{{ $siswa->status ?? 'pending' }}">
                                        {{ ucfirst($siswa->status ?? 'pending') }}
                                    </span>
                                </td>
                                <td>{{ $siswa->created_at ? $siswa->created_at->format('d/m/Y') : '-' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.6);">
                                    <i class="fas fa-file-alt fa-3x mb-3"></i><br>
                                    Belum ada data pendaftar
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="download-section">
                    <button class="download-btn btn-excel" onclick="downloadReport('excel')">
                        <i class="fas fa-file-excel"></i> Download Excel
                    </button>
                    <button class="download-btn btn-pdf" onclick="downloadReport('pdf')">
                        <i class="fas fa-file-pdf"></i> Download PDF
                    </button>
                    <button class="download-btn btn-csv" onclick="downloadReport('csv')">
                        <i class="fas fa-file-csv"></i> Download CSV
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Initialize charts
        function initCharts() {
            // Major Chart
            const majorCtx = document.getElementById('majorChart').getContext('2d');
            new Chart(majorCtx, {
                type: 'doughnut',
                data: {
                    labels: ['PPLG', 'DKV', 'ANIMASI', 'BDP', 'AKUNTANSI'],
                    datasets: [{
                        data: [25, 20, 15, 18, 22],
                        backgroundColor: [
                            '#00ff92',
                            '#0070f3',
                            '#ff0080',
                            '#ffc107',
                            '#28a745'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: {
                                color: 'white',
                                padding: 15
                            }
                        }
                    }
                }
            });

            // Status Chart
            const statusCtx = document.getElementById('statusChart').getContext('2d');
            new Chart(statusCtx, {
                type: 'bar',
                data: {
                    labels: ['Pending', 'Verified', 'Rejected'],
                    datasets: [{
                        label: 'Jumlah',
                        data: [45, 35, 5],
                        backgroundColor: [
                            '#ffc107',
                            '#28a745',
                            '#dc3545'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: false
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                color: 'white'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        },
                        x: {
                            ticks: {
                                color: 'white'
                            },
                            grid: {
                                color: 'rgba(255, 255, 255, 0.1)'
                            }
                        }
                    }
                }
            });
        }

        function generateReport() {
            const reportType = document.getElementById('reportType').value;
            const period = document.getElementById('period').value;
            const major = document.getElementById('major').value;
            const status = document.getElementById('status').value;
            
            // Update report title based on selection
            updateReportTitle(reportType, period, major, status);
            
            // Filter table data
            filterTableData(major, status);
            
            // Update charts
            updateCharts(major, status);
            
            // Show loading animation
            showLoading();
        }

        function updateReportTitle(type, period, major, status) {
            const reportTitle = document.querySelector('.report-title');
            let title = 'Laporan ';
            
            switch(type) {
                case 'pendaftar': title += 'Pendaftar'; break;
                case 'keuangan': title += 'Keuangan'; break;
                case 'verifikasi': title += 'Verifikasi'; break;
                case 'sebaran': title += 'Sebaran'; break;
            }
            
            if (major !== 'all') title += ` - ${major}`;
            if (period !== 'all') title += ` (${period.replace('gel', 'Gelombang ')})`;
            
            reportTitle.textContent = title + ' PPDB 2024';
        }

        function filterTableData(major, status) {
            const rows = document.querySelectorAll('.table tbody tr');
            let visibleCount = 0;
            
            rows.forEach(row => {
                if (row.cells.length < 6) return; // Skip empty row
                
                const rowMajor = row.cells[3].textContent.trim();
                const rowStatus = row.cells[4].textContent.toLowerCase().trim();
                
                const matchMajor = major === 'all' || rowMajor === major;
                const matchStatus = status === 'all' || rowStatus.includes(status);
                
                if (matchMajor && matchStatus) {
                    row.style.display = '';
                    visibleCount++;
                } else {
                    row.style.display = 'none';
                }
            });
            
            // Update stats
            updateStats(visibleCount);
        }

        function updateStats(filteredCount) {
            const statCards = document.querySelectorAll('.stat-value');
            if (statCards.length >= 1) {
                statCards[0].textContent = filteredCount;
            }
        }

        function updateCharts(major, status) {
            // Simulate chart update with filtered data
            console.log(`Updating charts for major: ${major}, status: ${status}`);
        }

        function showLoading() {
            const btn = document.querySelector('.generate-btn');
            const originalText = btn.innerHTML;
            
            btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Generating...';
            btn.disabled = true;
            
            setTimeout(() => {
                btn.innerHTML = originalText;
                btn.disabled = false;
            }, 2000);
        }

        // Auto-filter when dropdown changes
        function setupAutoFilter() {
            const selects = document.querySelectorAll('.filter-select');
            selects.forEach(select => {
                select.addEventListener('change', function() {
                    generateReport();
                });
            });
        }

        function downloadReport(format) {
            alert(`Downloading report in ${format.toUpperCase()} format...`);
        }

        // Initialize when page loads
        document.addEventListener('DOMContentLoaded', function() {
            initCharts();
            setupAutoFilter();
        });
    </script>
</body>
</html>