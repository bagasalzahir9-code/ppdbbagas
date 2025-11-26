@extends('admin.layout')
@section('title', 'Verifikasi Pembayaran')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Verifikasi Bukti Pembayaran</h2>
    </div>
</div>

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pendaftar as $siswa)
                        <tr>
                            <td>{{ $siswa->nama_lengkap }}</td>
                            <td>{{ $siswa->email }}</td>
                            <td>
                                <span class="badge bg-warning">{{ $siswa->bukti_pembayaran ? 'Menunggu Verifikasi' : 'Belum Upload' }}</span>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('keuangan.update', $siswa->id) }}" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="lunas">
                                    <button class="btn btn-success btn-sm">Verifikasi Lunas</button>
                                </form>
                                <form method="POST" action="{{ route('keuangan.update', $siswa->id) }}" class="d-inline">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="status" value="tolak">
                                    <button class="btn btn-danger btn-sm">Tolak</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection