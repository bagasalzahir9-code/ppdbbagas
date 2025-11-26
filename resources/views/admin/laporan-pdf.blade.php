<!DOCTYPE html>
<html>
<head>
    <title>Laporan Pendaftar PPDB</title>
    <meta charset="utf-8">
    <style>
        @page {
            margin: 1cm;
            size: A4;
        }
        body { 
            font-family: Arial, sans-serif; 
            font-size: 12px;
            margin: 0;
            padding: 20px;
            line-height: 1.4;
        }
        .header { 
            text-align: center; 
            margin-bottom: 30px;
            border-bottom: 2px solid #000;
            padding-bottom: 15px;
        }
        .logo {
            font-size: 20px;
            font-weight: bold;
            color: #000;
            margin-bottom: 5px;
        }
        .subtitle {
            font-size: 16px;
            margin: 5px 0;
            font-weight: bold;
        }
        .date {
            font-size: 12px;
            margin-top: 10px;
        }
        table { 
            width: 100%; 
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 11px;
        }
        th, td { 
            border: 1px solid #000; 
            padding: 8px 4px; 
            text-align: left;
        }
        th { 
            background-color: #f5f5f5;
            font-weight: bold;
            text-align: center;
        }
        .footer {
            margin-top: 30px;
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #000;
            padding-top: 15px;
        }
        .print-controls {
            position: fixed;
            top: 10px;
            right: 10px;
            background: rgba(0,0,0,0.8);
            color: white;
            padding: 15px;
            border-radius: 8px;
            z-index: 1000;
            font-size: 12px;
        }
        .print-btn {
            background: #28a745;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }
        .back-btn {
            background: #6c757d;
            color: white;
            border: none;
            padding: 8px 12px;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }
        @media print {
            .print-controls { display: none; }
            body { padding: 0; }
        }
    </style>
    <script>
        function printPage() {
            window.print();
        }
        function goBack() {
            window.history.back();
        }
    </script>
</head>
<body>
    <div class="print-controls">
        <div style="margin-bottom: 10px;"><strong>Laporan PPDB</strong></div>
        <button class="print-btn" onclick="printPage()">📄 Cetak PDF</button>
        <button class="back-btn" onclick="goBack()">← Kembali</button>
        <div style="margin-top: 10px; font-size: 10px;">Tekan Ctrl+P untuk cetak</div>
    </div>

    <div class="header">
        <div class="logo">SMK BAKTI NUSANTARA 666</div>
        <div class="subtitle">LAPORAN PENDAFTAR PPDB {{ date('Y') }}</div>
        <div class="date">Tanggal Cetak: {{ now()->format('d F Y') }}</div>
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
                <td>{{ ucfirst(str_replace('_', ' ', $p->status ?? 'draft')) }}</td>
                <td>{{ $p->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    <div class="footer">
        <strong>Total Pendaftar: {{ $pendaftar->count() }} orang</strong><br>
        Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}
    </div>
</body>
</html>