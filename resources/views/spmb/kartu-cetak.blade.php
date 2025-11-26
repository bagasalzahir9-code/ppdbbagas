<!DOCTYPE html>
<html>
<head>
    <title>Kartu Pendaftaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; margin: 20px; }
        .header { text-align: center; margin-bottom: 30px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .content { margin: 20px 0; }
        .row { display: flex; margin-bottom: 15px; }
        .label { width: 200px; font-weight: bold; }
        .value { flex: 1; border-bottom: 1px dotted #ccc; padding-bottom: 5px; }
        .footer { margin-top: 50px; text-align: center; }
        @media print {
            body { margin: 0; }
            .no-print { display: none; }
        }
    </style>
</head>
<body>
    <div class="no-print" style="text-align: center; margin-bottom: 20px;">
        <button onclick="window.print()" class="btn btn-primary">Cetak Kartu</button>
        <a href="{{ route('spmb.dashboard') }}" class="btn btn-secondary">Kembali</a>
    </div>

    <div class="header">
        <h2>KARTU PENDAFTARAN SPMB</h2>
        <h3>SMK BAKTI NUSANTARA 666</h3>
    </div>
    
    <div class="content">
        <div class="row">
            <div class="label">No. Pendaftaran:</div>
            <div class="value">{{ str_pad($calonSiswa->id, 6, '0', STR_PAD_LEFT) }}</div>
        </div>
        <div class="row">
            <div class="label">Nama Lengkap:</div>
            <div class="value">{{ $calonSiswa->nama_lengkap }}</div>
        </div>
        <div class="row">
            <div class="label">NIK:</div>
            <div class="value">{{ $calonSiswa->nik }}</div>
        </div>
        <div class="row">
            <div class="label">Tempat, Tanggal Lahir:</div>
            <div class="value">{{ $calonSiswa->tempat_lahir }}, {{ $calonSiswa->tanggal_lahir ? $calonSiswa->tanggal_lahir->format('d/m/Y') : '-' }}</div>
        </div>
        <div class="row">
            <div class="label">Jenis Kelamin:</div>
            <div class="value">{{ $calonSiswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</div>
        </div>
        <div class="row">
            <div class="label">Alamat:</div>
            <div class="value">{{ $calonSiswa->alamat }}</div>
        </div>
        <div class="row">
            <div class="label">No. HP:</div>
            <div class="value">{{ $calonSiswa->no_hp }}</div>
        </div>
        <div class="row">
            <div class="label">Asal Sekolah:</div>
            <div class="value">{{ $calonSiswa->asal_sekolah }}</div>
        </div>
        <div class="row">
            <div class="label">Jurusan Pilihan:</div>
            <div class="value">{{ $calonSiswa->jurusan_pilihan }}</div>
        </div>
        <div class="row">
            <div class="label">Status:</div>
            <div class="value">{{ ucfirst(str_replace('_', ' ', $calonSiswa->status)) }}</div>
        </div>
    </div>
    
    <div class="footer">
        <p>Dicetak pada: {{ now()->format('d/m/Y H:i:s') }}</p>
        <p><strong>Simpan kartu ini sebagai bukti pendaftaran</strong></p>
    </div>
</body>
</html>