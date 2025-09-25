<!DOCTYPE html>
<html>
<head>
    <title>Data Pegawai</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h4 class="mb-0">Data Pegawai</h4>
            <a href="{{ route('pegawai.create') }}" class="btn btn-light btn-sm">+ Tambah Pegawai</a>
        </div>
        <div class="card-body">
            @if ($pegawai->isEmpty())
                <div class="alert alert-warning">Belum ada data pegawai.</div>
            @else
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
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pegawai as $index => $p)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $p->nama }}</td>
                                <td>{{ $p->jabatan }}</td>
                                <td>{{ $p->alamat }}</td>
                                <td>{{ $p->telepon }}</td>
                                <td>{{ $p->email }}</td>
                                <td>{{ \Carbon\Carbon::parse($p->tgl_masuk)->format('d-m-Y') }}</td>
                                <td>Rp {{ number_format($p->gaji, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

</body>
</html>
