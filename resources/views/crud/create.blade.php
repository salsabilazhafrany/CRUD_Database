<!DOCTYPE html>
<html>
<head>
    <title>Tambah Paket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-4">

<h3>Tambah Paket Baru</h3>

<form action="{{ route('paket.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <label>Nama Paket</label>
    <input type="text" name="nama_paket" class="form-control mb-3" required>

    <label>Deskripsi</label>
    <textarea name="deskripsi" class="form-control mb-3" required></textarea>

    <label>Harga</label>
    <input type="number" name="harga" class="form-control mb-3" required>

    <label>Foto</label>
    <input type="file" name="foto" class="form-control mb-3">

    <button type="submit" class="btn btn-success">Simpan</button>
</form>

</body>
</html>
