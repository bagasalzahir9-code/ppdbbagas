@extends('admin.layout')
@section('title', 'Monitoring Berkas')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Monitoring Berkas</h2>
        <p>Lihat daftar pendaftar & kelengkapan berkas</p>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h5>Daftar Pendaftar</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Jurusan</th>
                        <th>Status</th>
                        <th>Berkas</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($pendaftar as $p)
                    <tr>
                        <td>{{ $p->id }}</td>
                        <td>{{ $p->nama_lengkap ?: '-' }}</td>
                        <td>{{ $p->email }}</td>
                        <td>{{ $p->jurusan_pilihan ?: '-' }}</td>
                        <td>
                            <span class="badge bg-{{ 
                                $p->status == 'lulus' ? 'success' : 
                                ($p->status == 'tidak_lulus' ? 'danger' : 
                                ($p->status == 'terbayar' ? 'info' : 'warning')) 
                            }}">
                                {{ ucfirst(str_replace('_', ' ', $p->status)) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-1">
                                @if($p->berkas_ijazah)<span class="badge bg-success">Ijazah</span>@endif
                                @if($p->berkas_raport)<span class="badge bg-success">Rapor</span>@endif
                                @if($p->berkas_kk)<span class="badge bg-success">KK</span>@endif
                                @if($p->berkas_kip)<span class="badge bg-info">KIP</span>@endif
                                @if($p->berkas_kks)<span class="badge bg-info">KKS</span>@endif
                                @if($p->berkas_akte)<span class="badge bg-info">Akte</span>@endif
                            </div>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <form method="POST" action="{{ route('admin.update.status', $p->id) }}" class="d-inline">
                                    @csrf
                                    <select name="status" class="form-select form-select-sm" onchange="this.form.submit()">
                                        <option value="draft" {{ $p->status == 'draft' ? 'selected' : '' }}>Draft</option>
                                        <option value="dikirim" {{ $p->status == 'dikirim' ? 'selected' : '' }}>Dikirim</option>
                                        <option value="verifikasi_admin" {{ $p->status == 'verifikasi_admin' ? 'selected' : '' }}>Verifikasi Admin</option>
                                        <option value="menunggu_pembayaran" {{ $p->status == 'menunggu_pembayaran' ? 'selected' : '' }}>Menunggu Pembayaran</option>
                                        <option value="terbayar" {{ $p->status == 'terbayar' ? 'selected' : '' }}>Terbayar</option>
                                        <option value="verifikasi_keuangan" {{ $p->status == 'verifikasi_keuangan' ? 'selected' : '' }}>Verifikasi Keuangan</option>
                                        <option value="lulus" {{ $p->status == 'lulus' ? 'selected' : '' }}>Lulus</option>
                                        <option value="tidak_lulus" {{ $p->status == 'tidak_lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                                        <option value="cadangan" {{ $p->status == 'cadangan' ? 'selected' : '' }}>Cadangan</option>
                                    </select>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        {{ $pendaftar->links() }}
    </div>
</div>
@endsection