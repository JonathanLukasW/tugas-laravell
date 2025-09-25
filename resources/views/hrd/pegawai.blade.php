@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Pegawai</h4>
            <div>
                <a href="{{ route('hrd.pegawai.create') }}" class="btn btn-light btn-sm">+ Tambah Pegawai</a>
            </div>
        </div>

        <div class="card-body">
            {{-- Pesan sukses --}}
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            {{-- Cek data pegawai --}}
            @if ($pegawai->isEmpty())
                <div class="alert alert-warning">Belum ada data pegawai.</div>
            @else
                <div class="table-responsive">
                    <table class="table table-striped table-hover align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Jabatan</th>
                                <th>Alamat</th>
                                <th>Telepon</th>
                                <th>Email</th>
                                <th>Tanggal Masuk</th>
                                <th>Gaji</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pegawai as $index => $p)
                                <tr @if($p->trashed()) class="table-danger" @endif>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        {{ $p->nama }}
                                        @if($p->trashed())
                                            <span class="badge bg-danger">Dihapus</span>
                                        @endif
                                    </td>
                                    <td>{{ $p->jabatan }}</td>
                                    <td>{{ $p->alamat }}</td>
                                    <td>{{ $p->telepon }}</td>
                                    <td>{{ $p->email }}</td>
                                    <td>{{ \Carbon\Carbon::parse($p->tgl_masuk)->format('d-m-Y') }}</td>
                                    <td>Rp {{ number_format($p->gaji, 0, ',', '.') }}</td>
                                    <td>
                                        @if($p->trashed())
                                            <span class="text-danger">Nonaktif</span>
                                        @else
                                            <span class="text-success">Aktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!$p->trashed())
                                            <a href="{{ route('hrd.pegawai.edit', $p->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('hrd.pegawai.destroy', $p->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus pegawai ini?');">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm">Hapus</button>
                                            </form>
                                        @else
                                            <form action="{{ route('hrd.pegawai.restore', $p->id) }}" method="POST" class="d-inline"
                                                onsubmit="return confirm('Kembalikan pegawai ini?');">
                                                @csrf
                                                <button class="btn btn-success btn-sm">Restore</button>
                                            </form>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection
