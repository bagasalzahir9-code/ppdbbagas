<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftar SPMB</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .no-print { display: none; }
        @media print { .no-print { display: none; } }
    </style>
</head>
<body>
    <div class="no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()">Cetak Laporan</button>
        <a href="{{ url()->previous() }}">Kembali</a>
    </div>

    <div class="header">
        <h2>LAPORAN PENDAFTAR SPMB</h2>
        <h3>SEKOLAH ABC</h3>
        <p>Tanggal: {{ now()->format('d/m/Y') }}</p>
    </div>
    
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
                <th>Status</th>
                <th>Tanggal Daftar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pendaftar as $index => $p)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $p->id }}</td>
                <td>{{ $p->nama_lengkap ?: '-' }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->jurusan_pilihan ?: '-' }}</td>
                <td>{{ ucfirst(str_replace('_', ' ', $p->status)) }}</td>
                <td>{{ $p->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div style="margin-top: 30px; text-align: right;">
        <p>Total Pendaftar: {{ $pendaftar->count() }}</p>
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
    </div>
</body>
</html>