<!DOCTYPE html>
<html>
<head>
    <title>Bukti Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; }
        .content { margin: 20px 0; }
        .row { display: flex; margin-bottom: 10px; }
        .label { width: 150px; font-weight: bold; }
        .value { flex: 1; }
        .footer { margin-top: 30px; text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>BUKTI PEMBAYARAN SPMB</h2>
        <h3>SEKOLAH ABC</h3>
        <hr>
    </div>
    
    <div class="content">
        <div class="row">
            <div class="label">No. Pendaftaran:</div>
            <div class="value">{{ str_pad($calonSiswa->id, 6, '0', STR_PAD_LEFT) }}</div>
        </div>
        <div class="row">
            <div class="label">Nama:</div>
            <div class="value">{{ $calonSiswa->nama_lengkap }}</div>
        </div>
        <div class="row">
            <div class="label">Jurusan:</div>
            <div class="value">{{ $calonSiswa->jurusan_pilihan }}</div>
        </div>
        <div class="row">
            <div class="label">Nominal Pembayaran:</div>
            <div class="value">Rp {{ number_format($calonSiswa->nominal_pembayaran ?: 500000, 0, ',', '.') }}</div>
        </div>
        <div class="row">
            <div class="label">Tanggal Pembayaran:</div>
            <div class="value">{{ $calonSiswa->tanggal_pembayaran->format('d/m/Y H:i:s') }}</div>
        </div>
        <div class="row">
            <div class="label">Status:</div>
            <div class="value">{{ ucfirst(str_replace('_', ' ', $calonSiswa->status)) }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
        <p><strong>Bukti pembayaran yang sah</strong></p>
    </div>
</body>
</html>