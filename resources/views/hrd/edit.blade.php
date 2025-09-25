@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-warning text-dark">
            <h4 class="mb-0">Edit Data Pegawai</h4>
        </div>
        <div class="card-body">

            {{-- Error umum --}}
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

            <form action="{{ route('hrd.pegawai.update', $pegawai->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" name="nama" id="nama" 
                           class="form-control @error('nama') is-invalid @enderror"
                           value="{{ old('nama', $pegawai->nama) }}">
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="jabatan" class="form-label">Jabatan</label>
                    <input type="text" name="jabatan" id="jabatan"
                           class="form-control @error('jabatan') is-invalid @enderror"
                           value="{{ old('jabatan', $pegawai->jabatan) }}">
                    @error('jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <input type="text" name="alamat" id="alamat"
                           class="form-control @error('alamat') is-invalid @enderror"
                           value="{{ old('alamat', $pegawai->alamat) }}">
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="telepon" class="form-label">Telepon</label>
                    <input type="text" name="telepon" id="telepon"
                           class="form-control @error('telepon') is-invalid @enderror"
                           value="{{ old('telepon', $pegawai->telepon) }}">
                    @error('telepon')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email', $pegawai->email) }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tgl_masuk" id="tgl_masuk"
                           class="form-control @error('tgl_masuk') is-invalid @enderror"
                           value="{{ old('tgl_masuk', $pegawai->tgl_masuk) }}">
                    @error('tgl_masuk')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="gaji" class="form-label">Gaji</label>
                    <input type="number" name="gaji" id="gaji"
                           class="form-control @error('gaji') is-invalid @enderror"
                           value="{{ old('gaji', $pegawai->gaji) }}">
                    @error('gaji')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('hrd.pegawai.index') }}" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</div>


@endsection