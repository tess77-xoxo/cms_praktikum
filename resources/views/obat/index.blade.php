<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Daftar Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1 class="fw-bold">Daftar Obat</h1>
        <a href="{{ route('obat.create') }}" class="btn btn-primary">Tambah Obat</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($obats as $obat)
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title">
                            {{ ucfirst($obat->nama) }} 
                            <span class="badge bg-secondary">{{ $obat->jenis }}</span>
                        </h5>
                        <p class="card-text mb-1">Stok: <strong>{{ $obat->stok }}</strong></p>
                        <p class="card-text mb-1">Harga: <strong>Rp{{ number_format($obat->harga, 0, ',', '.') }}</strong></p>
                        <p class="card-text mb-3">Exp: <strong>{{ $obat->expired_at }}</strong></p>
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-sm btn-outline-danger">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</div>
</body>
</html>
