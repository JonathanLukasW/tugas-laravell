<!DOCTYPE html>
<html>
<head>
    <title>Form Pegawai</title>
</head>
<body>
    <h1>Form Input Pegawai</h1>

    <form action="{{ route('pegawai.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama:</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <br>

        <div>
            <label for="jabatan">Jabatan:</label>
            <input type="text" name="jabatan" id="jabatan" required>
        </div>
        <br>

        <div>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat" required>
        </div>
        <br>

        <div>
            <label for="telepon">Telepon:</label>
            <input type="text" name="telepon" id="telepon" required>
        </div>
        <br>

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <br>

        <div>
            <label for="tgl_masuk">Tanggal Masuk:</label>
            <input type="date" name="tgl_masuk" id="tgl_masuk" required>
        </div>
        <br>

        <div>
            <label for="gaji">Gaji:</label>
            <input type="number" name="gaji" id="gaji" required>
        </div>
        <br>

        <button type="submit">Simpan</button>
    </form>
</body>
</html>
