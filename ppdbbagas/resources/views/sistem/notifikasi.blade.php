@extends('admin.layout')
@section('title', 'Notifikasi')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Kelola Notifikasi</h2>
        <p>Email/WhatsApp/SMS: aktivasi akun, permintaan perbaikan berkas, instruksi bayar, hasil verifikasi</p>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Penerima</th>
                        <th>Jenis</th>
                        <th>Judul</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($notifikasi as $n)
                    <tr>
                        <td>{{ $n->id }}</td>
                        <td>
                            <strong>{{ $n->calonSiswa->nama_lengkap ?? 'N/A' }}</strong><br>
                            <small>{{ $n->calonSiswa->email ?? 'N/A' }}</small>
                        </td>
                        <td>
                            <span class="badge bg-{{ $n->jenis == 'email' ? 'primary' : ($n->jenis == 'sms' ? 'success' : 'info') }}">
                                {{ strtoupper($n->jenis) }}
                            </span>
                        </td>
                        <td>{{ $n->judul }}</td>
                        <td>
                            <span class="badge bg-{{ $n->terkirim ? 'success' : 'warning' }}">
                                {{ $n->terkirim ? 'Terkirim' : 'Pending' }}
                            </span>
                        </td>
                        <td>{{ $n->tanggal_kirim ? $n->tanggal_kirim->format('d/m/Y H:i') : '-' }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $notifikasi->links() }}
    </div>
</div>
@endsection