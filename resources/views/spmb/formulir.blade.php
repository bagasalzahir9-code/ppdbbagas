@extends('spmb.layout')
@section('title', 'Formulir Pendaftaran')

@section('content')
<div class="row">
    <div class="col-md-12">
        <h2>Formulir Pendaftaran</h2>
        <p>Lengkapi data diri Anda dengan benar</p>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Data Pribadi</h5>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('spmb.formulir.simpan') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" name="nama_lengkap" class="form-control" value="{{ auth('calon_siswa')->user()->nama_lengkap }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" name="nik" class="form-control" value="{{ auth('calon_siswa')->user()->nik }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" name="tempat_lahir" class="form-control" value="{{ auth('calon_siswa')->user()->tempat_lahir }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tanggal_lahir" class="form-control" value="{{ auth('calon_siswa')->user()->tanggal_lahir }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="">Pilih Jenis Kelamin</option>
                                <option value="L" {{ auth('calon_siswa')->user()->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ auth('calon_siswa')->user()->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" name="no_hp" class="form-control" value="{{ auth('calon_siswa')->user()->no_hp }}" required>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" rows="3" required>{{ auth('calon_siswa')->user()->alamat }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Asal Sekolah</label>
                            <input type="text" name="asal_sekolah" class="form-control" value="{{ auth('calon_siswa')->user()->asal_sekolah }}" required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jurusan Pilihan</label>
                            <select name="jurusan_pilihan" class="form-control" required>
                                <option value="">Pilih Jurusan</option>
                                <option value="PPLG" {{ auth('calon_siswa')->user()->jurusan_pilihan == 'PPLG' ? 'selected' : '' }}>PPLG</option>
                                <option value="AKUNTANSI" {{ auth('calon_siswa')->user()->jurusan_pilihan == 'AKUNTANSI' ? 'selected' : '' }}>Akuntansi</option>
                                <option value="DKV" {{ auth('calon_siswa')->user()->jurusan_pilihan == 'DKV' ? 'selected' : '' }}>DKV</option>
                                <option value="ANIMASI" {{ auth('calon_siswa')->user()->jurusan_pilihan == 'ANIMASI' ? 'selected' : '' }}>Animasi</option>
                                <option value="BDP" {{ auth('calon_siswa')->user()->jurusan_pilihan == 'BDP' ? 'selected' : '' }}>BDP</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" name="action" value="draft" class="btn btn-primary">Simpan Draft</button>
                    <button type="submit" name="action" value="submit" class="btn btn-success">Kirim Pendaftaran</button>
                    <a href="{{ route('spmb.dashboard') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h6>Panduan Pengisian</h6>
            </div>
            <div class="card-body">
                <ul class="small">
                    <li>Isi semua data dengan benar</li>
                    <li>NIK sesuai KTP/Kartu Keluarga</li>
                    <li>Alamat lengkap dengan kode pos</li>
                    <li>Pilih jurusan sesuai minat</li>
                    <li>Data dapat disimpan sebagai draft</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection