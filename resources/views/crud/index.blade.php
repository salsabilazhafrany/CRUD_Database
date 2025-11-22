<!DOCTYPE html>
<html lang="id">
<head>
 <meta charset="UTF-8">
 <title>Data CRUD - Klinik Kecantikan</title>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

 <style>
     body {
         background-color: #ffeef5; /* soft pink pastel */
     }

     .navbar {
         background-color: #ff9ecb !important; /* pink pastel lembut */
     }

     .navbar-brand, 
     .nav-link {
         color: white !important;
         font-weight: 600;
     }

     .nav-link:hover {
         color: #ffe5f0 !important;
     }

     h3 {
         color: #d85a8f;
         font-weight: bold;
     }

     .btn-success {
         background-color: #ff7db8;
         border: none;
     }

     .btn-success:hover {
         background-color: #ff5fa7;
     }

     .btn-warning {
         background-color: #ffcfda;
         border: none;
         color: #b83e71;
     }

     .btn-danger {
         background-color: #ff8fb3;
         border: none;
     }

     .card {
         background-color: #ffffffcc;
         backdrop-filter: blur(4px);
     }

     .table-primary {
         background-color: #ffd5e8 !important;
         color: #b83e71;
     }
 </style>

</head>

<body>

<nav class="navbar navbar-expand-lg">
 <div class="container-fluid">
     <a class="navbar-brand fw-bold" href="{{ route('dashboard') }}">
         🌸 Klinik Kecantikan
     </a>

     <div class="collapse navbar-collapse">
         <ul class="navbar-nav ms-auto">
             <li class="nav-item"><a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a></li>
             <li class="nav-item">
                 <a class="nav-link fw-bold" style="color:#fff7a5 !important;" href="{{ route('logout') }}">
                     Logout
                 </a>
             </li>
         </ul>
     </div>
 </div>
</nav>

<div class="container py-5">

 <div class="d-flex justify-content-between align-items-center mb-3">
     <h3>Paket Kecantikan</h3>
     <a href="{{ route('crud.create') }}" class="btn btn-success">+ Tambah Data</a>
 </div>

 <div class="card shadow border-0 rounded-4">
     <div class="card-body">

         <table class="table table-striped table-bordered align-middle text-center">
             <thead class="table-primary">
                 <tr>
                     <th>ID</th>
                     <th>Nama</th>
                     <th>Keahlian</th>
                     <th>Foto</th>
                     <th>Aksi</th>
                 </tr>
             </thead>

             <tbody>
                 @forelse ($data as $item)
                 <tr>
                     <td>{{ $item->id }}</td>
                     <td>{{ $item->nama }}</td>
                     <td>{{ $item->keahlian }}</td>

                     <td>
                         @if($item->foto)
                             <img src="{{ asset('fotos/'.$item->foto) }}" width="60" class="rounded-3 shadow-sm">
                         @else
                             <span class="text-muted">Tidak ada foto</span>
                         @endif
                     </td>

                     <td>
                         <a href="{{ route('crud.edit', $item->id) }}" class="btn btn-warning btn-sm">Edit</a>
                         <a href="{{ route('crud.delete', $item->id) }}" class="btn btn-danger btn-sm"
                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                            Hapus
                        </a>
                     </td>
                 </tr>
                 @empty
                 <tr>
                     <td colspan="5" class="text-muted">Belum ada data.</td>
                 </tr>
                 @endforelse
             </tbody>

         </table>

     </div>
 </div>
</div>

</body>
</html>
