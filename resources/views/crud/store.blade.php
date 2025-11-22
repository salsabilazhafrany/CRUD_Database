<!DOCTYPE html>
<html>
<head>
    <title>Data Tersimpan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="p-5">

<div class="container">

    <div class="alert alert-success">
        <h4>Data berhasil disimpan!</h4>
        <p>Paket baru telah ditambahkan ke database.</p>
    </div>

    <div class="card p-4 shadow-sm">
        <h5>Detail Paket:</h5>
        <p><strong>Nama Paket:</strong> {{ $nama_paket }}</p>
        <p><strong>Deskripsi:</strong> {{ $deskripsi }}</p>
        <p><strong>Harga:</strong> Rp {{ number_format($harga) }}</p>

        @if($foto)
        <p><strong>Foto:</strong></p>
        <img src="{{ asset('storage/' . $foto) }}" width="200" class="rounded shadow">
        @endif
    </div>

    <a href="{{ route('crud.index') }}" class="btn btn-primary mt-3">Kembali ke Daftar</a>
</div>

</body>
</html>
