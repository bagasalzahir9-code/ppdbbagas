<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifikasi Pembayaran - SMK BAKTI NUSANTARA 666</title>
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
        }
        
        .header-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            border: none;
            margin-bottom: 30px;
        }
        
        .stats-row {
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.95);
            border: none;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            transition: transform 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 1.5rem;
        }
        
        .stat-icon.pending {
            background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
            color: white;
        }
        
        .stat-icon.verified {
            background: linear-gradient(135deg, #11998e 0%, #38ef7d 100%);
            color: white;
        }
        
        .stat-icon.total {
            background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
            color: white;
        }
        
        .payment-card {
            border: none;
            border-radius: 15px;
            margin-bottom: 20px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.95);
        }
        
        .payment-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.15);
        }
        
        .student-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: linear-gradient(135deg, #667eea, #764ba2);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 1.5rem;
            font-weight: bold;
        }
        
        .amount-badge {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .btn-verify {
            background: linear-gradient(135deg, #11998e, #38ef7d);
            border: none;
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .btn-reject {
            background: linear-gradient(135deg, #f093fb, #f5576c);
            border: none;
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .btn-view {
            background: linear-gradient(135deg, #4facfe, #00f2fe);
            border: none;
            color: white;
            border-radius: 25px;
            padding: 8px 20px;
            font-weight: 500;
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 500;
        }
        
        .status-pending {
            background: rgba(255, 193, 7, 0.2);
            color: #f5576c;
        }
        
        .status-verified {
            background: rgba(40, 167, 69, 0.2);
            color: #38ef7d;
        }
        
        .filter-card {
            background: rgba(255, 255, 255, 0.9);
            border: none;
            border-radius: 15px;
            margin-bottom: 20px;
        }
        
        .search-input {
            border: 1px solid rgba(102, 126, 234, 0.3);
            border-radius: 25px;
            padding: 10px 20px;
        }
        
        .search-input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
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
                        <a class="nav-link active" href="{{ route('keuangan.pembayaran') }}">
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
        <!-- Header -->
        <div class="card header-card">
            <div class="card-body text-center">
                <h2><i class="fas fa-credit-card me-2"></i>Verifikasi Pembayaran</h2>
                <p class="mb-0">Validasi bukti pembayaran dan kelola status pembayaran siswa</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="row stats-row">
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon pending">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h4>{{ count($pembayaran ?? []) }}</h4>
                    <p class="text-muted mb-0">Pending Verifikasi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon verified">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <h4>0</h4>
                    <p class="text-muted mb-0">Terverifikasi</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="stat-card">
                    <div class="stat-icon total">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <h4>Rp {{ number_format(count($pembayaran ?? []) * 500000, 0, ',', '.') }}</h4>
                    <p class="text-muted mb-0">Total Nominal</p>
                </div>
            </div>
        </div>

        <!-- Filter -->
        <div class="card filter-card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <input type="text" class="form-control search-input" placeholder="Cari nama siswa atau email..." id="searchInput">
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="statusFilter">
                            <option value="">Semua Status</option>
                            <option value="pending">Pending</option>
                            <option value="verified">Terverifikasi</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select class="form-select" id="jurusanFilter">
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
        </div>

        <!-- Payment Cards -->
        <div class="row" id="paymentList">
            @forelse($pembayaran ?? [] as $p)
            <div class="col-md-6 payment-item" data-name="{{ strtolower($p->nama_lengkap ?? 'Test Student') }}" data-status="pending" data-jurusan="{{ $p->jurusan_pilihan ?? 'PPLG' }}">
                <div class="card payment-card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="student-avatar">
                                    {{ substr($p->nama_lengkap ?? 'TS', 0, 1) }}
                                </div>
                            </div>
                            <div class="col">
                                <h6 class="mb-1 fw-bold">{{ $p->nama_lengkap ?? 'Test Student' }}</h6>
                                <p class="text-muted mb-1">{{ $p->email ?? 'test@student.com' }}</p>
                                <span class="badge bg-primary">{{ $p->jurusan_pilihan ?? 'PPLG' }}</span>
                            </div>
                            <div class="col-auto text-end">
                                <div class="amount-badge mb-2">
                                    Rp {{ number_format($p->nominal_pembayaran ?? 500000, 0, ',', '.') }}
                                </div>
                                <div>
                                    <small class="text-muted">{{ $p->tanggal_pembayaran ? $p->tanggal_pembayaran->format('d/m/Y H:i') : date('d/m/Y H:i') }}</small>
                                </div>
                            </div>
                        </div>
                        
                        <hr>
                        
                        <div class="row align-items-center">
                            <div class="col">
                                @if($p->bukti_pembayaran ?? true)
                                    <button class="btn btn-view btn-sm me-2" onclick="viewProof({{ $p->id ?? 1 }})">
                                        <i class="fas fa-eye"></i> Lihat Bukti
                                    </button>
                                @else
                                    <span class="text-muted">Belum upload bukti</span>
                                @endif
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-verify btn-sm me-2" onclick="verifyPayment({{ $p->id ?? 1 }})">
                                    <i class="fas fa-check"></i> Verifikasi
                                </button>
                                <button class="btn btn-reject btn-sm" onclick="rejectPayment({{ $p->id ?? 1 }})">
                                    <i class="fas fa-times"></i> Tolak
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @empty
            <div class="col-12">
                <div class="card">
                    <div class="card-body text-center py-5">
                        <i class="fas fa-credit-card fa-4x text-muted mb-3"></i>
                        <h5 class="text-muted">Belum ada pembayaran yang perlu diverifikasi</h5>
                    </div>
                </div>
            </div>
            @endforelse
        </div>
    </div>

    <!-- Modal Reject -->
    <div class="modal fade" id="rejectModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tolak Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label">Alasan Penolakan</label>
                        <textarea class="form-control" id="rejectReason" rows="3" placeholder="Masukkan alasan penolakan pembayaran..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-danger" onclick="confirmReject()">Tolak Pembayaran</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal View Proof -->
    <div class="modal fade" id="proofModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Bukti Pembayaran</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <img src="https://via.placeholder.com/600x400/667eea/ffffff?text=Bukti+Pembayaran" class="img-fluid rounded" alt="Bukti Pembayaran">
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let currentPaymentId = null;

        function viewProof(id) {
            const modal = new bootstrap.Modal(document.getElementById('proofModal'));
            modal.show();
        }

        function verifyPayment(id) {
            if (confirm('Verifikasi pembayaran ini sebagai VALID?')) {
                alert('Pembayaran berhasil diverifikasi!');
                // Add actual verification logic here
            }
        }

        function rejectPayment(id) {
            currentPaymentId = id;
            const modal = new bootstrap.Modal(document.getElementById('rejectModal'));
            modal.show();
        }

        function confirmReject() {
            const reason = document.getElementById('rejectReason').value;
            if (reason.trim() === '') {
                alert('Harap masukkan alasan penolakan!');
                return;
            }
            
            alert('Pembayaran berhasil ditolak dengan alasan: ' + reason);
            bootstrap.Modal.getInstance(document.getElementById('rejectModal')).hide();
            // Add actual rejection logic here
        }

        // Filter functionality
        document.getElementById('searchInput').addEventListener('input', filterPayments);
        document.getElementById('statusFilter').addEventListener('change', filterPayments);
        document.getElementById('jurusanFilter').addEventListener('change', filterPayments);

        function filterPayments() {
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            const statusFilter = document.getElementById('statusFilter').value;
            const jurusanFilter = document.getElementById('jurusanFilter').value;
            const items = document.querySelectorAll('.payment-item');

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