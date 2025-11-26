@extends('spmb.layout')
@section('title', 'Formulir Pendaftaran')

@section('content')
<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h4>Formulir Pendaftaran</h4>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('spmb.form') }}">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Nama Lengkap *</label>
                                <input type="text" name="nama_lengkap" class="form-control" value="{{ $calonSiswa->nama_lengkap }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">NIK *</label>
                                <input type="text" name="nik" class="form-control" value="{{ $calonSiswa->nik }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tempat Lahir *</label>
                                <input type="text" name="tempat_lahir" class="form-control" value="{{ $calonSiswa->tempat_lahir }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Tanggal Lahir *</label>
                                <input type="date" name="tanggal_lahir" class="form-control" value="{{ $calonSiswa->tanggal_lahir }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jenis Kelamin *</label>
                        <select name="jenis_kelamin" class="form-control" required>
                            <option value="">Pilih</option>
                            <option value="L" {{ $calonSiswa->jenis_kelamin == 'L' ? 'selected' : '' }}>Laki-laki</option>
                            <option value="P" {{ $calonSiswa->jenis_kelamin == 'P' ? 'selected' : '' }}>Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Alamat *</label>
                        <textarea name="alamat" class="form-control" rows="3" required>{{ $calonSiswa->alamat }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kecamatan *</label>
                                <input type="text" name="kecamatan" class="form-control" value="{{ $calonSiswa->kecamatan }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kelurahan *</label>
                                <input type="text" name="kelurahan" class="form-control" value="{{ $calonSiswa->kelurahan }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="mb-3">
                                <label class="form-label">Kode Pos</label>
                                <input type="text" name="kode_pos" class="form-control" value="{{ $calonSiswa->kode_pos }}">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">No HP *</label>
                                <input type="text" name="no_hp" class="form-control" value="{{ $calonSiswa->no_hp }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Asal Sekolah *</label>
                                <input type="text" name="asal_sekolah" class="form-control" value="{{ $calonSiswa->asal_sekolah }}" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Jurusan Pilihan *</label>
                        <select name="jurusan_pilihan" class="form-control" required>
                            <option value="">Pilih Jurusan</option>
                            @foreach($jurusan as $j)
                            <option value="{{ $j->nama_jurusan }}" {{ $calonSiswa->jurusan_pilihan == $j->nama_jurusan ? 'selected' : '' }}>
                                {{ $j->nama_jurusan }} (Kuota: {{ $j->kuota }})
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan Data</button>
                    <a href="{{ route('spmb.dashboard') }}" class="btn btn-secondary">Kembali</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection