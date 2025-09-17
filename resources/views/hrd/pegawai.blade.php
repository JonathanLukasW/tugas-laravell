<!DOCTYPE html>
<html>
<head>
    <title>Daftar Pegawai</title>
</head>
<body>
    <h1>Daftar Pegawai</h1>
    <a href="{{ route('pegawai.create') }}">Tambah Pegawai</a>
    <table border="1" cellpadding="5">
        <tr>
            <th>Nama</th>
            <th>Jabatan</th>
            <th>Alamat</th>
            <th>Telepon</th>
            <th>Email</th>
            <th>Tanggal Masuk</th>
            <th>Gaji</th>
        </tr>
        
        @foreach($pegawai as $p)
        <tr>
            <td>{{ $p->nama }}</td>
            <td>{{ $p->jabatan }}</td>
            <td>{{ $p->alamat }}</td>
            <td>{{ $p->telepon }}</td>
            <td>{{ $p->email }}</td>
            <td>{{ $p->tgl_masuk }}</td>
            <td>{{ $p->gaji }}</td>
        </tr>
        @endforeach
    </table>
</body>
</html>
