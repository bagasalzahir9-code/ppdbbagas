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
                <form>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Nama Lengkap</label>
                            <input type="text" class="form-control" value="{{ auth('calon_siswa')->user()->nama_lengkap }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">NIK</label>
                            <input type="text" class="form-control" value="{{ auth('calon_siswa')->user()->nik }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tempat Lahir</label>
                            <input type="text" class="form-control" value="{{ auth('calon_siswa')->user()->tempat_lahir }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" value="{{ auth('calon_siswa')->user()->tanggal_lahir }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <select class="form-control">
                                <option value="L" {{ auth('calon_siswa')->user()->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ auth('calon_siswa')->user()->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">No HP</label>
                            <input type="text" class="form-control" value="{{ auth('calon_siswa')->user()->no_hp }}">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea class="form-control" rows="3">{{ auth('calon_siswa')->user()->alamat }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Asal Sekolah</label>
                            <input type="text" class="form-control" value="{{ auth('calon_siswa')->user()->asal_sekolah }}">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jurusan Pilihan</label>
                            <select class="form-control">
                                <option value="">Pilih Jurusan</option>
                                <option value="PPLG">PPLG</option>
                                <option value="Akuntansi">Akuntansi</option>
                                <option value="DKV">DKV</option>
                                <option value="Animasi">Animasi</option>
                                <option value="BDP">BDP</option>
                            </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Draft</button>
                    <button type="submit" class="btn btn-success">Kirim Pendaftaran</button>
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