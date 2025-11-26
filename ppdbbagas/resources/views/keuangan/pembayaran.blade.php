<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembayaran - PPDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="{{ route('keuangan.dashboard') }}">Dashboard Keuangan PPDB</a>
            <div class="navbar-nav ms-auto">
                <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="card">
            <div class="card-header d-flex justify-content-between">
                <h5>Daftar Pembayaran</h5>
                <a href="{{ route('keuangan.dashboard') }}" class="btn btn-secondary">Kembali</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Pembayaran</th>
                                <th>Jumlah</th>
                                <th>Tanggal Bayar</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pembayaran as $index => $bayar)
                            <tr>
                                <td>{{ $pembayaran->firstItem() + $index }}</td>
                                <td>{{ $bayar->pendaftar->dataSiswa->nama ?? 'N/A' }}</td>
                                <td class="text-capitalize">{{ str_replace('_', ' ', $bayar->jenis_pembayaran) }}</td>
                                <td>Rp {{ number_format($bayar->jumlah, 0, ',', '.') }}</td>
                                <td>{{ $bayar->tanggal_bayar->format('d/m/Y') }}</td>
                                <td>
                                    <span class="badge bg-{{ $bayar->status == 'lunas' ? 'success' : ($bayar->status == 'pending' ? 'warning' : 'danger') }}">
                                        {{ ucfirst($bayar->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($bayar->status == 'pending')
                                    <div class="btn-group" role="group">
                                        <form action="{{ route('keuangan.verifikasi', $bayar->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="lunas">
                                            <button type="submit" class="btn btn-sm btn-success">
                                                <i class="fas fa-check"></i> Terima
                                            </button>
                                        </form>
                                        <form action="{{ route('keuangan.verifikasi', $bayar->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="status" value="ditolak">
                                            <button type="submit" class="btn btn-sm btn-danger">
                                                <i class="fas fa-times"></i> Tolak
                                            </button>
                                        </form>
                                    </div>
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                
                {{ $pembayaran->links() }}
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>