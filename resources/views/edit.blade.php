<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data | Sistem CRUD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

{{-- Navbar --}}
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
        <a class="navbar-brand fw-bold" href="#">Sistem CRUD</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('crud.index') }}">Data CRUD</a></li>
                <li class="nav-item"><a class="nav-link text-warning fw-bold" href="{{ route('logout') }}">Logout</a></li>
            </ul>
        </div>
    </div>
</nav>

{{-- Konten Utama --}}
<div class="container my-5">
    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body p-4">
            
            <h2 class="mb-4">Form Edit Data Keahlian</h2>

            <form action="{{ route('crud.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                @csrf 

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                           id="nama" name="nama" value="{{ old('nama', $item->nama) }}" required>
                    
                    @error('nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="keahlian" class="form-label">Keahlian</label>
                    <input type="text" class="form-control @error('keahlian') is-invalid @enderror" 
                           id="keahlian" name="keahlian" value="{{ old('keahlian', $item->keahlian) }}" required>
                    
                    @error('keahlian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @Eerror
                </div>

                <div class="mb-3">
                    <label for="foto" class="form-label">Foto (Opsional)</label>
                    <input class="form-control @error('foto') is-invalid @enderror" 
                           type="file" id="foto" name="foto">
                    <small class="text-muted">Kosongkan jika tidak ingin mengubah foto.</small>
                    
                    @error('foto')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror

                    @if ($item->foto)
                        <div class="mt-2">
                            {{-- KODE YANG BENAR --}}
                            <img src="{{ asset('fotos/' . $item->foto) }}" alt="Foto Lama" style="width: 150px; height: auto; border-radius: 8px;">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <a href="{{ route('crud.index') }}" class="btn btn-secondary">Batal</a>
                    <button type="submit" class="btn btn-primary">Update Data</button>
                </div>
            </form>

        </div>
    </div>
</div>

</body>
</html>