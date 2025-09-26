@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Profil Pengguna') }}</div>

                <div class="card-body">
                    <h3>Detail Akun</h3>
                    <p><strong>Nama:</strong> {{ $user->name }}</p>
                    <p><strong>Email:</strong> {{ $user->email }}</p>
                    <p><strong>Nomor Telepon:</strong> {{ $user->phone_number ?? '-' }}</p>
                    <p><strong>Alamat:</strong> {{ $user->address ?? '-' }}</p>
                    
                    <!-- Tambahkan link kembali ke halaman utama jika diperlukan -->
                    <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Kembali ke Beranda</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection