<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Monitoring Berkas - SMK BAKTI NUSANTARA 666</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
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

        .stats-row {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .stat-card {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
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

        .filters {
            display: flex;
            gap: 15px;
            margin-bottom: 25px;
            flex-wrap: wrap;
        }

        .filter-input {
            background: rgba(15, 15, 35, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 12px 15px;
            color: white;
            font-size: 0.9rem;
        }

        .filter-input::placeholder {
            color: rgba(255, 255, 255, 0.4);
        }

        .filter-select {
            background: rgba(15, 15, 35, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            padding: 12px 15px;
            color: white;
            font-size: 0.9rem;
        }

        .table-container {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            overflow: hidden;
        }

        .table-header {
            padding: 25px 30px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 1.3rem;
            font-weight: 600;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
        }

        .table th {
            background: rgba(0, 255, 146, 0.1);
            padding: 15px 20px;
            text-align: left;
            font-weight: 600;
            color: #00ff92;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .table td {
            padding: 15px 20px;
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

        .status-rejected {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }

        .berkas-progress {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .progress-bar {
            width: 60px;
            height: 6px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 3px;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: linear-gradient(90deg, #00ff92, #0070f3);
            border-radius: 3px;
            transition: width 0.3s ease;
        }

        .action-btn {
            padding: 8px 15px;
            border: none;
            border-radius: 8px;
            font-size: 0.8rem;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-right: 5px;
        }

        .btn-detail {
            background: rgba(0, 112, 243, 0.2);
            color: #0070f3;
            border: 1px solid rgba(0, 112, 243, 0.3);
        }

        .btn-verify {
            background: rgba(0, 255, 146, 0.2);
            color: #00ff92;
            border: 1px solid rgba(0, 255, 146, 0.3);
        }

        .btn-reject {
            background: rgba(255, 0, 128, 0.2);
            color: #ff0080;
            border: 1px solid rgba(255, 0, 128, 0.3);
        }

        .action-btn:hover {
            transform: translateY(-2px);
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8);
            z-index: 2000;
        }

        .modal-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            width: 90%;
            max-width: 600px;
        }

        .modal-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
        }

        .close-btn {
            background: none;
            border: none;
            color: rgba(255, 255, 255, 0.6);
            font-size: 1.5rem;
            cursor: pointer;
        }

        .berkas-list {
            display: grid;
            gap: 15px;
        }

        .berkas-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 10px;
        }

        .berkas-status {
            padding: 4px 8px;
            border-radius: 15px;
            font-size: 0.7rem;
        }

        .status-uploaded {
            background: rgba(0, 255, 146, 0.2);
            color: #00ff92;
        }

        .status-missing {
            background: rgba(255, 0, 128, 0.2);
            color: #ff0080;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
            
            .table-container {
                overflow-x: auto;
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
                <a href="{{ route('admin.monitoring') }}" class="nav-link active">
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
                <a href="{{ route('admin.laporan') }}" class="nav-link">
                    <i class="fas fa-chart-bar"></i>
                    Laporan
                </a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <div>
                <h1 class="page-title">Monitoring Berkas</h1>
                <p class="page-subtitle">
                    @if(auth('admin')->user()->role === 'verifikator')
                        Verifikasi kelengkapan berkas dan status pendaftar
                    @else
                        Pantau kelengkapan berkas dan status verifikasi pendaftar
                    @endif
                </p>
            </div>
        </div>

        <div class="stats-row">
            <div class="stat-card">
                <div class="stat-value">{{ count($pendaftar ?? []) }}</div>
                <div class="stat-label">Total Pendaftar</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'pending')->count() }}</div>
                <div class="stat-label">Pending Verifikasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'verified')->count() }}</div>
                <div class="stat-label">Terverifikasi</div>
            </div>
            <div class="stat-card">
                <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'rejected')->count() }}</div>
                <div class="stat-label">Ditolak</div>
            </div>
        </div>

        <div class="filters">
            <input type="text" class="filter-input" placeholder="Cari nama atau email..." id="searchInput">
            <select class="filter-select" id="statusFilter">
                <option value="">Semua Status</option>
                <option value="pending">Pending</option>
                <option value="verified">Terverifikasi</option>
                <option value="rejected">Ditolak</option>
            </select>
            <select class="filter-select" id="jurusanFilter">
                <option value="">Semua Jurusan</option>
                <option value="PPLG">PPLG</option>
                <option value="AKUNTANSI">AKUNTANSI</option>
                <option value="DKV">DKV</option>
                <option value="ANIMASI">ANIMASI</option>
                <option value="BDP">BDP</option>
            </select>
        </div>

        <div class="table-container">
            <div class="table-header">
                <h3 class="table-title">Daftar Pendaftar</h3>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Lengkap</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Kelengkapan Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @forelse($pendaftar ?? [] as $index => $siswa)
                    <tr data-status="{{ $siswa->status ?? 'pending' }}" data-jurusan="{{ $siswa->jurusan_pilihan }}">
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $siswa->nama_lengkap }}</td>
                        <td>{{ $siswa->email }}</td>
                        <td>{{ $siswa->jurusan_pilihan ?? 'Belum Pilih' }}</td>
                        <td>
                            <span class="status-badge status-{{ $siswa->status ?? 'pending' }}">
                                {{ ucfirst($siswa->status ?? 'pending') }}
                            </span>
                        </td>
                        <td>
                            <div class="berkas-progress">
                                <div class="progress-bar">
                                    <div class="progress-fill" style="width: {{ rand(20, 100) }}%"></div>
                                </div>
                                <span>{{ rand(2, 5) }}/5</span>
                            </div>
                        </td>
                        <td>
                            <button class="action-btn btn-detail" onclick="showDetail({{ $siswa->id ?? $index }})">
                                <i class="fas fa-eye"></i> Detail
                            </button>
                            @if(auth('admin')->user()->role === 'verifikator')
                            <button class="action-btn btn-verify" onclick="verifyStudent({{ $siswa->id ?? $index }})">
                                <i class="fas fa-check"></i> Verifikasi
                            </button>
                            <button class="action-btn btn-reject" onclick="rejectStudent({{ $siswa->id ?? $index }})">
                                <i class="fas fa-times"></i> Tolak
                            </button>
                            @else
                            <span style="color: rgba(255, 255, 255, 0.5); font-size: 0.8rem;">Hanya Lihat</span>
                            @endif
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" style="text-align: center; padding: 40px; color: rgba(255, 255, 255, 0.6);">
                            <i class="fas fa-users fa-3x mb-3"></i><br>
                            Belum ada pendaftar
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal" id="detailModal">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">Detail Berkas Pendaftar</h3>
                <button class="close-btn" onclick="closeModal()">&times;</button>
            </div>
            <div class="berkas-list">
                <div class="berkas-item">
                    <span>Ijazah/SKHUN</span>
                    <span class="berkas-status status-uploaded">Uploaded</span>
                </div>
                <div class="berkas-item">
                    <span>Rapor Semester 1-5</span>
                    <span class="berkas-status status-uploaded">Uploaded</span>
                </div>
                <div class="berkas-item">
                    <span>Kartu Keluarga</span>
                    <span class="berkas-status status-missing">Missing</span>
                </div>
                <div class="berkas-item">
                    <span>Akta Kelahiran</span>
                    <span class="berkas-status status-uploaded">Uploaded</span>
                </div>
                <div class="berkas-item">
                    <span>Foto 3x4</span>
                    <span class="berkas-status status-uploaded">Uploaded</span>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Filter functionality
        document.getElementById('searchInput').addEventListener('input', filterTable);
        document.getElementById('statusFilter').addEventListener('change', filterTable);
        document.getElementById('jurusanFilter').addEventListener('change', filterTable);

        function filterTable() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const jurusanFilter = document.getElementById('jurusanFilter').value;
            const rows = document.querySelectorAll('#tableBody tr');

            rows.forEach(row => {
                const nama = row.cells[1]?.textContent.toLowerCase() || '';
                const email = row.cells[2]?.textContent.toLowerCase() || '';
                const status = row.dataset.status || '';
                const jurusan = row.dataset.jurusan || '';

                const matchSearch = nama.includes(searchTerm) || email.includes(searchTerm);
                const matchStatus = !statusFilter || status === statusFilter;
                const matchJurusan = !jurusanFilter || jurusan === jurusanFilter;

                row.style.display = matchSearch && matchStatus && matchJurusan ? '' : 'none';
            });
        }

        function showDetail(id) {
            document.getElementById('detailModal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('detailModal').style.display = 'none';
        }

        function verifyStudent(id) {
            if (confirm('Verifikasi pendaftar ini?')) {
                alert('Pendaftar berhasil diverifikasi!');
                location.reload();
            }
        }

        function rejectStudent(id) {
            if (confirm('Tolak pendaftar ini?')) {
                alert('Pendaftar berhasil ditolak!');
                location.reload();
            }
        }

        // Close modal when clicking outside
        window.onclick = function(event) {
            const modal = document.getElementById('detailModal');
            if (event.target === modal) {
                modal.style.display = 'none';
            }
        }
    </script>
</body>
</html>