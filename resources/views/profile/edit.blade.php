@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Pesan Sukses Global --}}
            @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            {{-- Bagian 1: Update Profil (Nama & Kontak) --}}
            <div class="card mb-4 shadow-sm">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Update Informasi Profil</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
                            @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input
                                type="email"
                                class="form-control @error('email') is-invalid @enderror"
                                id="email"
                                name="email"
                                value="{{ old('email', $user->email) }}"
                                required
                                readonly> @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Telepon --}}
                        <div class="mb-3">
                            <label for="phone_number" class="form-label">Nomor Telepon (Opsional)</label>
                            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number) }}">
                            @error('phone_number')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Alamat --}}
                        <div class="mb-3">
                            <label for="address" class="form-label">Alamat (Opsional)</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address">{{ old('address', $user->address) }}</textarea>
                            @error('address')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Simpan Profil</button>
                    </form>
                </div>
            </div>

            {{-- Bagian 2: Update Password --}}
            <div class="card shadow-sm">
                <div class="card-header bg-warning text-dark">
                    <h5 class="mb-0">Update Kata Sandi</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.password') }}">
                        @csrf

                        {{-- Password Lama --}}
                        <div class="mb-3">
                            <label for="current_password" class="form-label">Kata Sandi Lama</label>
                            <input type="password" class="form-control @error('current_password') is-invalid @enderror" id="current_password" name="current_password" required>
                            @error('current_password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Password Baru --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Kata Sandi Baru</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                            @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Konfirmasi Password Baru --}}
                        <div class="mb-3">
                            <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi Baru</label>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                        </div>

                        <button type="submit" class="btn btn-warning">Ganti Kata Sandi</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection