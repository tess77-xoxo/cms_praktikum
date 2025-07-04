@extends('layouts.app')

@section('title', 'Daftar Obat')

@section('content')
<script>document.body.classList.remove('login-apotek-bg','stok-obat-bg');</script>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="judul-obat">Daftar Obat</h1>
        <a href="{{ route('obat.create') }}" class="btn btn-tambah px-4 py-2">+ Tambah Obat</a>
    </div>
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    <div class="row row-cols-1 row-cols-md-2 g-4">
        @foreach($obats as $obat)
            <div class="col">
                <div class="card obat-card">
                    @if($obat->images && $obat->images->count())
                        <img src="{{ asset('storage/' . $obat->images->first()->path) }}" class="card-img-top obat-img" alt="gambar obat">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title mb-2">
                            <span class="badge badge-jenis">{{ $obat->jenis }}</span><br>
                            <span class="fw-bold">{{ $obat->nama_obat ?? $obat->nama ?? '-' }}</span>
                        </h5>
                        <p class="card-text mb-1">Stok: <strong>{{ $obat->stok }}</strong></p>
                        <p class="card-text mb-1">Harga: <strong>Rp{{ number_format($obat->harga, 0, ',', '.') }}</strong></p>
                        <p class="card-text mb-3">Exp: <strong>{{ $obat->expired_date ?? $obat->expired_at ?? '-' }}</strong></p>
                        <div class="d-flex gap-2">
                            <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-outline-primary rounded-pill px-4">Edit</a>
                            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Yakin ingin menghapus?')" class="btn btn-outline-danger rounded-pill px-4">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
