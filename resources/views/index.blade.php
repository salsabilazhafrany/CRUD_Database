<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Keahlian | Sistem CRUD</title>
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
        <div class="card-body">
            
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2 class="m-0">Data Keahlian</h2>
                <a href="{{ route('crud.create') }}" class="btn btn-success rounded-pill px-4">
                    + Tambah Data
                </a>
            </div>

            {{-- Pesan Sukses (jika ada) --}}
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Keahlian</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($data as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->nama }}</td>
                            <td>{{ $item->keahlian }}</td>
                            <td>
                                @if ($item->foto)
                                    {{-- KODE YANG BENAR --}}
                                    <img src="{{ asset('fotos/' . $item->foto) }}" alt="{{ $item->nama }}" style="width: 100px; height: auto; border-radius: 8px;">
                                @else
                                    <span class="text-muted">Tidak ada foto</span>
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('crud.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <a href="{{ route('crud.delete', $item->id) }}" class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted py-4">
                                <strong>Data masih kosong.</strong>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            
            <div class="d-flex justify-content-center mt-4">
                {{ $data->links() }}
            </div>

        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>