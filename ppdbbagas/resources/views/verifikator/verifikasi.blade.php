<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Berkas - SMK BAKTI NUSANTARA 666</title>
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
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
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
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
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
            background: rgba(255, 107, 107, 0.1);
            color: #ff6b6b;
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

        .welcome-text h1 {
            font-size: 2rem;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .welcome-text p {
            color: rgba(255, 255, 255, 0.6);
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 40px;
        }

        .stat-card {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 107, 107, 0.3);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: linear-gradient(90deg, #ff6b6b, #ee5a24, #ff9ff3);
        }

        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        .stat-icon.pending { background: rgba(255, 193, 7, 0.2); color: #ffc107; }
        .stat-icon.verified { background: rgba(40, 167, 69, 0.2); color: #28a745; }
        .stat-icon.rejected { background: rgba(220, 53, 69, 0.2); color: #dc3545; }
        .stat-icon.total { background: rgba(255, 107, 107, 0.2); color: #ff6b6b; }

        .stat-value {
            font-size: 2.5rem;
            font-weight: 800;
            margin-bottom: 5px;
        }

        .stat-label {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
        }

        .control-panel {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            margin-bottom: 40px;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            padding: 15px 20px;
            color: #ffffff;
            font-weight: 500;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.1);
            border-color: rgba(255, 107, 107, 0.5);
            color: #ffffff;
            box-shadow: 0 0 20px rgba(255, 107, 107, 0.2);
        }

        .form-control::placeholder {
            color: rgba(255, 255, 255, 0.5);
        }

        .verification-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
            gap: 25px;
        }

        .student-card {
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 30px;
            transition: all 0.3s ease;
        }

        .student-card:hover {
            transform: translateY(-5px);
            border-color: rgba(255, 107, 107, 0.3);
        }

        .student-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #ff6b6b, #ee5a24);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: 700;
            color: white;
            margin-bottom: 15px;
        }

        .student-name {
            font-size: 1.2rem;
            font-weight: 600;
            margin-bottom: 5px;
        }

        .student-email {
            color: rgba(255, 255, 255, 0.6);
            font-size: 0.9rem;
            margin-bottom: 15px;
        }

        .major-badge {
            background: rgba(255, 107, 107, 0.2);
            color: #ff6b6b;
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            display: inline-block;
            margin-bottom: 20px;
        }

        .status-badge {
            padding: 8px 15px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            display: inline-block;
            margin-bottom: 20px;
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

        .action-buttons {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.85rem;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
        }

        .btn-view {
            background: rgba(33, 150, 243, 0.2);
            color: #2196f3;
            border: 1px solid rgba(33, 150, 243, 0.3);
        }

        .btn-view:hover {
            background: rgba(33, 150, 243, 0.3);
            transform: translateY(-2px);
        }

        .btn-approve {
            background: rgba(40, 167, 69, 0.2);
            color: #28a745;
            border: 1px solid rgba(40, 167, 69, 0.3);
        }

        .btn-approve:hover {
            background: rgba(40, 167, 69, 0.3);
            transform: translateY(-2px);
        }

        .btn-reject {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
            border: 1px solid rgba(220, 53, 69, 0.3);
        }

        .btn-reject:hover {
            background: rgba(220, 53, 69, 0.3);
            transform: translateY(-2px);
        }

        .empty-state {
            text-align: center;
            padding: 60px;
            background: rgba(15, 15, 35, 0.6);
            backdrop-filter: blur(20px);
            border: 2px dashed rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }

        .empty-icon {
            font-size: 4rem;
            color: rgba(255, 107, 107, 0.5);
            margin-bottom: 20px;
        }

        .modal-content {
            background: rgba(15, 15, 35, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
        }

        .modal-header {
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modal-title {
            color: #ffffff;
            font-weight: 600;
        }

        .document-gallery {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
        }

        .doc-container {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .doc-container:hover {
            transform: scale(1.02);
            border-color: rgba(255, 107, 107, 0.3);
        }

        .doc-header {
            background: rgba(255, 107, 107, 0.2);
            color: #ff6b6b;
            padding: 15px;
            font-weight: 600;
            text-align: center;
            font-size: 0.9rem;
        }

        .logout-btn {
            background: rgba(220, 53, 69, 0.1);
            border: 1px solid rgba(220, 53, 69, 0.3);
            color: #dc3545;
            padding: 10px 20px;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .logout-btn:hover {
            background: rgba(220, 53, 69, 0.2);
            color: #dc3545;
        }

        @media (max-width: 768px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .main-content {
                margin-left: 0;
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-section">
            <div class="logo-icon">
                <i class="fas fa-user-check"></i>
            </div>
            <div class="logo-text">Verifikator PPDB</div>
        </div>
        
        <nav class="nav-menu">
            <div class="nav-item">
                <a href="{{ route('verifikator.dashboard') }}" class="nav-link">
                    <i class="fas fa-home"></i>
                    Dashboard
                </a>
            </div>
            <div class="nav-item">
                <a href="{{ route('verifikator.verifikasi') }}" class="nav-link active">
                    <i class="fas fa-clipboard-check"></i>
                    Verifikasi Berkas
                </a>
            </div>
        </nav>
    </div>

    <div class="main-content">
        <div class="header">
            <div class="welcome-text">
                <h1>Verifikasi Berkas</h1>
                <p>Kelola dan verifikasi berkas pendaftar PPDB</p>
            </div>
            <div class="user-info">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="logout-btn">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon total">
                        <i class="fas fa-file-alt"></i>
                    </div>
                </div>
                <div class="stat-value">{{ count($pendaftar ?? []) }}</div>
                <div class="stat-label">Total Berkas</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'pending')->count() }}</div>
                <div class="stat-label">Pending Review</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon verified">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'verified')->count() }}</div>
                <div class="stat-label">Terverifikasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon rejected">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ collect($pendaftar ?? [])->where('status', 'rejected')->count() }}</div>
                <div class="stat-label">Ditolak</div>
            </div>
        </div>

        <!-- Control Panel -->
        <div class="control-panel">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <input type="text" class="form-control" placeholder="Cari nama siswa atau email..." id="searchInput">
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select form-control" id="statusFilter">
                        <option value="">Semua Status</option>
                        <option value="pending">Pending</option>
                        <option value="verified">Terverifikasi</option>
                        <option value="rejected">Ditolak</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3">
                    <select class="form-select form-control" id="jurusanFilter">
                        <option value="">Semua Jurusan</option>
                        <option value="PPLG">PPLG</option>
                        <option value="AKUNTANSI">AKUNTANSI</option>
                        <option value="DKV">DKV</option>
                        <option value="ANIMASI">ANIMASI</option>
                        <option value="BDP">BDP</option>
                    </select>
                </div>
            </div>
        </div>

        <!-- Verification Grid -->
        <div class="verification-grid" id="studentGrid">
            @forelse($pendaftar ?? [] as $siswa)
            <div class="student-card student-item" data-name="{{ strtolower($siswa->nama_lengkap ?? 'Test Student') }}" data-status="{{ strtolower($siswa->status ?? 'pending') }}" data-jurusan="{{ $siswa->jurusan_pilihan ?? 'PPLG' }}">
                <div class="d-flex align-items-start mb-3">
                    <div class="student-avatar me-3">
                        {{ substr($siswa->nama_lengkap ?? 'TS', 0, 1) }}
                    </div>
                    <div class="flex-grow-1">
                        <div class="student-name">{{ $siswa->nama_lengkap ?? 'Test Student' }}</div>
                        <div class="student-email">{{ $siswa->email ?? 'test@student.com' }}</div>
                        <div class="major-badge">{{ $siswa->jurusan_pilihan ?? 'PPLG' }}</div>
                    </div>
                </div>
                
                <div class="status-badge status-{{ strtolower($siswa->status ?? 'pending') }}">
                    @if(($siswa->status ?? 'pending') == 'verified')
                        <i class="fas fa-check-circle me-1"></i> Terverifikasi
                    @elseif(($siswa->status ?? 'pending') == 'rejected')
                        <i class="fas fa-times-circle me-1"></i> Ditolak
                    @else
                        <i class="fas fa-clock me-1"></i> Pending
                    @endif
                </div>
                
                <div class="action-buttons">
                    <button class="btn btn-view" onclick="viewDocuments({{ $siswa->id ?? 1 }})">
                        <i class="fas fa-eye me-1"></i> Lihat Berkas
                    </button>
                    @if(($siswa->status ?? 'pending') == 'pending')
                    <form method="POST" action="{{ route('verifikator.update', $siswa->id ?? 1) }}" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="verified">
                        <button class="btn btn-approve" type="submit">
                            <i class="fas fa-check me-1"></i> Verifikasi
                        </button>
                    </form>
                    <button class="btn btn-reject" onclick="rejectStudent({{ $siswa->id ?? 1 }})">
                        <i class="fas fa-times me-1"></i> Tolak
                    </button>
                    @endif
                </div>
            </div>
            @empty
            <div class="empty-state">
                <i class="fas fa-file-alt empty-icon"></i>
                <h3 class="text-white fw-bold mb-3">Belum Ada Berkas</h3>
                <p class="text-white-50">Belum ada berkas yang perlu diverifikasi saat ini.</p>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal Reject -->
    <div class="modal fade" id="rejectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tolak Berkas</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label text-white fw-bold">Alasan Penolakan</label>
                        <textarea class="form-control" id="rejectReason" rows="4" placeholder="Masukkan alasan penolakan berkas..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-reject" onclick="confirmReject()">Tolak Berkas</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View Documents -->
    <div class="modal fade" id="documentsModal">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Berkas Pendaftar</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="document-gallery">
                        <div class="doc-container">
                            <div class="doc-header">Foto Siswa</div>
                            <img src="https://via.placeholder.com/250x300/ff6b6b/ffffff?text=FOTO+SISWA" class="img-fluid" alt="Foto Siswa">
                        </div>
                        <div class="doc-container">
                            <div class="doc-header">Ijazah SMP</div>
                            <img src="https://via.placeholder.com/250x300/ee5a24/ffffff?text=IJAZAH" class="img-fluid" alt="Ijazah">
                        </div>
                        <div class="doc-container">
                            <div class="doc-header">Kartu Keluarga</div>
                            <img src="https://via.placeholder.com/250x300/ff9ff3/ffffff?text=KARTU+KELUARGA" class="img-fluid" alt="Kartu Keluarga">
                        </div>
                        <div class="doc-container">
                            <div class="doc-header">Akta Kelahiran</div>
                            <img src="https://via.placeholder.com/250x300/ffa726/ffffff?text=AKTA+KELAHIRAN" class="img-fluid" alt="Akta Kelahiran">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        let currentStudentId = null;

        function viewDocuments(id) {
            const modal = new bootstrap.Modal(document.getElementById('documentsModal'));
            modal.show();
        }

        function rejectStudent(id) {
            currentStudentId = id;
            const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
            modal.show();
        }

        function confirmReject() {
            const reason = document.getElementById('rejectReason').value;
            if (reason.trim() === '') {
                alert('Harap masukkan alasan penolakan');
                return;
            }
            
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/verifikator/verifikasi/${currentStudentId}`;
            
            const csrfToken = document.createElement('input');
            csrfToken.type = 'hidden';
            csrfToken.name = '_token';
            csrfToken.value = '{{ csrf_token() }}';
            
            const methodInput = document.createElement('input');
            methodInput.type = 'hidden';
            methodInput.name = '_method';
            methodInput.value = 'PUT';
            
            const statusInput = document.createElement('input');
            statusInput.type = 'hidden';
            statusInput.name = 'status';
            statusInput.value = 'rejected';
            
            const reasonInput = document.createElement('input');
            reasonInput.type = 'hidden';
            reasonInput.name = 'reason';
            reasonInput.value = reason;
            
            form.appendChild(csrfToken);
            form.appendChild(methodInput);
            form.appendChild(statusInput);
            form.appendChild(reasonInput);
            
            document.body.appendChild(form);
            form.submit();
        }

        // Filter Functions
        document.getElementById('searchInput').addEventListener('input', filterStudents);
        document.getElementById('statusFilter').addEventListener('change', filterStudents);
        document.getElementById('jurusanFilter').addEventListener('change', filterStudents);

        function filterStudents() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value.toLowerCase();
            const jurusanFilter = document.getElementById('jurusanFilter').value;
            const items = document.querySelectorAll('.student-item');

            items.forEach(item => {
                const name = item.dataset.name;
                const status = item.dataset.status;
                const jurusan = item.dataset.jurusan;

                const matchSearch = name.includes(searchTerm);
                const matchStatus = !statusFilter || status === statusFilter;
                const matchJurusan = !jurusanFilter || jurusan === jurusanFilter;

                item.style.display = matchSearch && matchStatus && matchJurusan ? 'block' : 'none';
            });
        }
    </script>
</body>
</html>