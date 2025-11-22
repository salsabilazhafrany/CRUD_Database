<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Edit Data</title>
 <link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
rel="stylesheet">
</head>
<body class="bg-light">
<div class="container py-5">
 <div class="card shadow border-0 rounded-4">
 <div class="card-body">
 <h4 class="mb-4">Edit Data</h4>
 <form action="{{ route('crud.update', $item['id']) }}" method="POST"
enctype="multipart/form-data">
 @csrf
 <div class="mb-3">
 <label class="form-label">Nama</label>
 <input type="text" name="nama" class="form-control" value="{{
$item['nama'] }}" required>
 </div>
 <div class="mb-3">
 <label class="form-label">Keahlian</label>
 <input type="text" name="keahlian" class="form-control" value="{{
$item['keahlian'] }}" required>
 </div>
 <div class="mb-3">
 <label class="form-label">Foto Baru</label>
 <input type="file" name="foto" class="form-control">
 @if($item['foto'])
 <div class="mt-2">
 <img src="{{ asset('uploads/'.$item['foto']) }}" width="100"
class="rounded-3 shadow-sm">
 </div>
 @endif
 </div>
 <button type="submit" class="btn btn-primary">Update</button>
 <a href="{{ route('crud.index') }}" class="btn btn-secondary">Kembali</a>
 </form>
 </div>
 </div>
</div>
</body>
</html>