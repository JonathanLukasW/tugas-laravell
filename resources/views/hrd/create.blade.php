@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h4 class="mb-0">Form Input Pegawai</h4>
            </div>
            <div class="card-body">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Periksa kembali inputan Anda!</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('hrd.pegawai.store') }}" method="POST" enctype="multipart/form-data"> 
                    @csrf

                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" id="nama"
                            class="form-control @error('nama') is-invalid @enderror"
                            value="{{ old('nama') }}">
                        @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="jabatan" class="form-label">Jabatan</label>
                        <input type="text" name="jabatan" id="jabatan"
                            class="form-control @error('jabatan') is-invalid @enderror"
                            value="{{ old('jabatan') }}">
                        @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" id="alamat"
                            class="form-control @error('alamat') is-invalid @enderror"
                            value="{{ old('alamat') }}">
                        @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" id="telepon"
                            class="form-control @error('telepon') is-invalid @enderror"
                            value="{{ old('telepon') }}">
                        @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" id="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}">
                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="photo" class="form-label">Foto Pegawai (Max 2MB)</label>
                        <input type="file" name="photo" id="photo"
                            class="form-control @error('photo') is-invalid @enderror"
                            accept="image/*">
                        @error('photo')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                        <input type="date" name="tgl_masuk" id="tgl_masuk"
                            class="form-control @error('tgl_masuk') is-invalid @enderror"
                            value="{{ old('tgl_masuk') }}">
                        @error('tgl_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="gaji" class="form-label">Gaji</label>
                        <input type="number" name="gaji" id="gaji"
                            class="form-control @error('gaji') is-invalid @enderror"
                            value="{{ old('gaji') }}">
                        @error('gaji')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-success">Simpan</button>
                    <a href="{{ route('hrd.pegawai.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection