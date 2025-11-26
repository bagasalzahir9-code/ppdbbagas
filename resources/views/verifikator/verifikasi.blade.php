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
        
        .btn-close-white {
            filter: invert(1) grayscale(100%) brightness(200%);
        }

        .document-gallery {
            max-height: 70vh;
            overflow-y: auto;
        }

        .doc-container {
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 15px;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .doc-container:hover {
            transform: translateY(-2px);
            border-color: rgba(255, 107, 107, 0.3);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }

        .doc-header {
            padding: 15px;
            font-weight: 600;
            text-align: center;
            font-size: 0.9rem;
        }
        
        .btn-sm {
            padding: 6px 12px;
            font-size: 0.8rem;
        }
        
        .btn-outline-success {
            background: transparent;
            border: 1px solid #28a745;
            color: #28a745;
        }
        
        .btn-outline-success:hover {
            background: #28a745;
            color: white;
        }
        
        .flex-wrap {
            flex-wrap: wrap;
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
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif
        
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
                <div class="stat-value">{{ count($pendaftar) }}</div>
                <div class="stat-label">Total Berkas</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $pendaftar->whereIn('status', ['draft', 'dikirim'])->count() }}</div>
                <div class="stat-label">Pending Review</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon verified">
                        <i class="fas fa-check-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $pendaftar->whereIn('status', ['verifikasi_admin', 'menunggu_pembayaran'])->count() }}</div>
                <div class="stat-label">Terverifikasi</div>
            </div>
            
            <div class="stat-card">
                <div class="stat-header">
                    <div class="stat-icon rejected">
                        <i class="fas fa-times-circle"></i>
                    </div>
                </div>
                <div class="stat-value">{{ $pendaftar->where('status', 'ditolak')->count() }}</div>
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
            @forelse($pendaftar as $siswa)
            <div class="student-card student-item" data-name="{{ strtolower($siswa->nama_lengkap ?? $siswa->email) }}" data-status="{{ in_array($siswa->status, ['draft', 'dikirim']) ? 'pending' : (in_array($siswa->status, ['verifikasi_admin', 'menunggu_pembayaran']) ? 'verified' : 'rejected') }}" data-jurusan="{{ $siswa->jurusan_pilihan ?? 'PPLG' }}">
                <div class="d-flex align-items-start mb-3">
                    <div class="student-avatar me-3">
                        {{ substr($siswa->nama_lengkap ?? $siswa->email, 0, 1) }}
                    </div>
                    <div class="flex-grow-1">
                        <div class="student-name">{{ $siswa->nama_lengkap ?? 'Belum diisi' }}</div>
                        <div class="student-email">{{ $siswa->email }}</div>
                        <div class="major-badge">{{ $siswa->jurusan_pilihan ?? 'Belum pilih' }}</div>
                    </div>
                </div>
                
                @php
                    $statusClass = 'pending';
                    $statusText = 'Pending';
                    $statusIcon = 'clock';
                    
                    if (in_array($siswa->status, ['verifikasi_admin', 'menunggu_pembayaran'])) {
                        $statusClass = 'verified';
                        $statusText = 'Terverifikasi';
                        $statusIcon = 'check-circle';
                    } elseif ($siswa->status == 'terbayar') {
                        $statusClass = 'verified';
                        $statusText = 'Siap Seleksi';
                        $statusIcon = 'check-circle';
                    } elseif ($siswa->status == 'lulus') {
                        $statusClass = 'verified';
                        $statusText = 'LULUS';
                        $statusIcon = 'trophy';
                    } elseif ($siswa->status == 'tidak_lulus') {
                        $statusClass = 'rejected';
                        $statusText = 'TIDAK LULUS';
                        $statusIcon = 'times-circle';
                    } elseif ($siswa->status == 'cadangan') {
                        $statusClass = 'pending';
                        $statusText = 'CADANGAN';
                        $statusIcon = 'list';
                    } elseif ($siswa->status == 'ditolak') {
                        $statusClass = 'rejected';
                        $statusText = 'Ditolak';
                        $statusIcon = 'times-circle';
                    }
                @endphp
                
                <div class="status-badge status-{{ $statusClass }}">
                    <i class="fas fa-{{ $statusIcon }} me-1"></i> {{ $statusText }}
                </div>
                
                <div class="mb-3">
                    <small class="text-white-50">Berkas Wajib:</small>
                    <div class="d-flex gap-1 mt-1 mb-2">
                        <span class="badge {{ $siswa->berkas_ijazah ? 'bg-success' : 'bg-danger' }}">
                            <i class="fas {{ $siswa->berkas_ijazah ? 'fa-check' : 'fa-times' }}"></i> Ijazah
                        </span>
                        <span class="badge {{ $siswa->berkas_raport ? 'bg-success' : 'bg-danger' }}">
                            <i class="fas {{ $siswa->berkas_raport ? 'fa-check' : 'fa-times' }}"></i> Rapor
                        </span>
                        <span class="badge {{ $siswa->berkas_kk ? 'bg-success' : 'bg-danger' }}">
                            <i class="fas {{ $siswa->berkas_kk ? 'fa-check' : 'fa-times' }}"></i> KK
                        </span>
                    </div>
                    @if($siswa->berkas_kip || $siswa->berkas_kks || $siswa->berkas_akte)
                    <small class="text-white-50">Berkas Opsional:</small>
                    <div class="d-flex gap-1 mt-1">
                        @if($siswa->berkas_kip)
                            <span class="badge bg-info"><i class="fas fa-check"></i> KIP</span>
                        @endif
                        @if($siswa->berkas_kks)
                            <span class="badge bg-info"><i class="fas fa-check"></i> KKS</span>
                        @endif
                        @if($siswa->berkas_akte)
                            <span class="badge bg-info"><i class="fas fa-check"></i> Akte</span>
                        @endif
                    </div>
                    @endif
                </div>
                
                <!-- Quick File Access -->
                @if($siswa->berkas_ijazah || $siswa->berkas_raport || $siswa->berkas_kk)
                <div class="mb-3">
                    <small class="text-white-50">Akses Cepat:</small>
                    <div class="d-flex gap-1 mt-1 flex-wrap">
                        @if($siswa->berkas_ijazah)
                            <a href="{{ route('verifikator.file', ['id' => $siswa->id, 'type' => 'berkas_ijazah']) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-file-alt"></i> Ijazah
                            </a>
                        @endif
                        @if($siswa->berkas_raport)
                            <a href="{{ route('verifikator.file', ['id' => $siswa->id, 'type' => 'berkas_raport']) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-file-alt"></i> Rapor
                            </a>
                        @endif
                        @if($siswa->berkas_kk)
                            <a href="{{ route('verifikator.file', ['id' => $siswa->id, 'type' => 'berkas_kk']) }}" target="_blank" class="btn btn-outline-success btn-sm">
                                <i class="fas fa-file-alt"></i> KK
                            </a>
                        @endif
                    </div>
                </div>
                @endif
                
                <div class="action-buttons">
                    <button class="btn btn-view" onclick="viewDocuments({{ $siswa->id }}, '{{ $siswa->nama_lengkap ?? $siswa->email }}')">
                        <i class="fas fa-eye me-1"></i> Lihat Semua
                    </button>
                    @if(in_array($siswa->status, ['draft', 'dikirim']))
                    <form method="POST" action="{{ route('verifikator.update', $siswa->id) }}" class="d-inline">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="status" value="verified">
                        <button class="btn btn-approve" type="submit">
                            <i class="fas fa-check me-1"></i> Verifikasi
                        </button>
                    </form>
                    <button class="btn btn-reject" onclick="rejectStudent({{ $siswa->id }})">
                        <i class="fas fa-times me-1"></i> Tolak
                    </button>
                    @elseif($siswa->status == 'terbayar')
                    <button class="btn btn-approve" onclick="setHasilSeleksi({{ $siswa->id }}, 'lulus')">
                        <i class="fas fa-trophy me-1"></i> Lulus
                    </button>
                    <button class="btn btn-reject" onclick="setHasilSeleksi({{ $siswa->id }}, 'tidak_lulus')">
                        <i class="fas fa-times me-1"></i> Tidak Lulus
                    </button>
                    <button class="btn btn-view" onclick="setHasilSeleksi({{ $siswa->id }}, 'cadangan')">
                        <i class="fas fa-list me-1"></i> Cadangan
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
                    <div id="studentInfo" class="mb-4">
                        <h6 class="text-white">Data Siswa: <span id="studentName"></span></h6>
                    </div>
                    <div class="document-gallery" id="documentGallery">
                        <!-- Documents will be loaded here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        let currentStudentId = null;
        const students = @json($pendaftar);
        
        // Debug: Log students data
        console.log('Students data loaded:', students);
        console.log('Total students:', students.length);

        function viewDocuments(id, name) {
            currentStudentId = id;
            const student = students.find(s => s.id == id);
            
            console.log('Viewing documents for student ID:', id);
            console.log('Student found:', student);
            console.log('Student files:', {
                ijazah: student?.berkas_ijazah,
                raport: student?.berkas_raport,
                kk: student?.berkas_kk,
                kip: student?.berkas_kip,
                kks: student?.berkas_kks,
                akte: student?.berkas_akte
            });
            
            document.getElementById('studentName').textContent = name;
            
            const gallery = document.getElementById('documentGallery');
            gallery.innerHTML = '';
            
            // Show student info
            const infoDiv = document.createElement('div');
            infoDiv.className = 'mb-4 p-3';
            infoDiv.style.background = 'rgba(255,255,255,0.1)';
            infoDiv.style.borderRadius = '10px';
            infoDiv.innerHTML = `
                <h6 class="text-white mb-2">Informasi Siswa</h6>
                <p class="text-white-50 mb-1">Email: ${student?.email || 'N/A'}</p>
                <p class="text-white-50 mb-1">Jurusan: ${student?.jurusan_pilihan || 'Belum pilih'}</p>
                <p class="text-white-50 mb-0">Status: ${student?.status || 'draft'}</p>
            `;
            gallery.appendChild(infoDiv);
            
            const documents = [
                { field: 'berkas_ijazah', label: 'Ijazah', file: student?.berkas_ijazah },
                { field: 'berkas_raport', label: 'Rapor', file: student?.berkas_raport },
                { field: 'berkas_kk', label: 'Kartu Keluarga', file: student?.berkas_kk },
                { field: 'berkas_kip', label: 'KIP', file: student?.berkas_kip },
                { field: 'berkas_kks', label: 'KKS', file: student?.berkas_kks },
                { field: 'berkas_akte', label: 'Akte Kelahiran', file: student?.berkas_akte }
            ];
            
            // Create document grid
            const docGrid = document.createElement('div');
            docGrid.style.display = 'grid';
            docGrid.style.gridTemplateColumns = 'repeat(auto-fit, minmax(250px, 1fr))';
            docGrid.style.gap = '20px';
            
            documents.forEach(doc => {
                const container = document.createElement('div');
                container.className = 'doc-container';
                container.style.border = '1px solid rgba(255,255,255,0.2)';
                container.style.borderRadius = '10px';
                container.style.overflow = 'hidden';
                
                const header = document.createElement('div');
                header.className = 'doc-header';
                header.style.background = doc.file ? 'rgba(40, 167, 69, 0.2)' : 'rgba(108, 117, 125, 0.2)';
                header.style.color = doc.file ? '#28a745' : '#6c757d';
                header.style.padding = '15px';
                header.style.fontWeight = '600';
                header.style.textAlign = 'center';
                header.innerHTML = `<i class="fas ${doc.file ? 'fa-file-check' : 'fa-file-times'}"></i> ${doc.label}`;
                
                const content = document.createElement('div');
                content.style.padding = '20px';
                content.style.textAlign = 'center';
                content.style.minHeight = '120px';
                content.style.display = 'flex';
                content.style.flexDirection = 'column';
                content.style.alignItems = 'center';
                content.style.justifyContent = 'center';
                
                if (doc.file) {
                    const fileInfo = document.createElement('div');
                    fileInfo.className = 'mb-3';
                    fileInfo.innerHTML = `<small class="text-success">File: ${doc.file.split('/').pop()}</small>`;
                    content.appendChild(fileInfo);
                    
                    const link = document.createElement('a');
                    link.href = `{{ route('verifikator.file', ['id' => '__ID__', 'type' => '__TYPE__']) }}`.replace('__ID__', id).replace('__TYPE__', doc.field);
                    link.target = '_blank';
                    link.className = 'btn btn-success btn-sm';
                    link.innerHTML = '<i class="fas fa-eye"></i> Lihat File';
                    link.onclick = function(e) {
                        console.log('Opening file:', link.href);
                        // Show loading indicator
                        link.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Membuka...';
                        setTimeout(() => {
                            link.innerHTML = '<i class="fas fa-eye"></i> Lihat File';
                        }, 2000);
                    };
                    content.appendChild(link);
                    
                    // Add download button
                    const downloadLink = document.createElement('a');
                    downloadLink.href = link.href;
                    downloadLink.download = doc.file.split('/').pop();
                    downloadLink.className = 'btn btn-outline-success btn-sm mt-2';
                    downloadLink.innerHTML = '<i class="fas fa-download"></i> Download';
                    content.appendChild(downloadLink);
                } else {
                    content.innerHTML = '<span class="text-muted"><i class="fas fa-file-slash fa-2x mb-2"></i><br>Belum diupload</span>';
                }
                
                container.appendChild(header);
                container.appendChild(content);
                docGrid.appendChild(container);
            });
            
            gallery.appendChild(docGrid);
            
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

        function setHasilSeleksi(id, status) {
            const statusText = {
                'lulus': 'LULUS',
                'tidak_lulus': 'TIDAK LULUS', 
                'cadangan': 'CADANGAN'
            };
            
            if (confirm(`Yakin ingin menetapkan siswa ini sebagai ${statusText[status]}?`)) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = `/verifikator/hasil-seleksi/${id}`;
                
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
                statusInput.value = status;
                
                form.appendChild(csrfToken);
                form.appendChild(methodInput);
                form.appendChild(statusInput);
                
                document.body.appendChild(form);
                form.submit();
            }
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