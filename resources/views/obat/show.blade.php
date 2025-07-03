@extends('layouts.app')

@section('title', 'Detail Obat')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-info text-white fw-bold rounded-top-4">Detail Obat</div>
                <div class="card-body">
                    @if($obat->images && $obat->images->count())
                        <img src="{{ asset('storage/' . $obat->images->first()->path) }}" class="card-img-top mb-3 rounded-3" alt="gambar obat" style="max-height:200px;object-fit:cover;">
                    @endif
                    <ul class="list-group mb-3">
                        <li class="list-group-item"><strong>Nama:</strong> {{ $obat->nama_obat ?? $obat->nama ?? '-' }}</li>
                        <li class="list-group-item"><strong>Jenis:</strong> {{ $obat->jenis }}</li>
                        <li class="list-group-item"><strong>Stok:</strong> {{ $obat->stok }}</li>
                        <li class="list-group-item"><strong>Harga:</strong> Rp{{ number_format($obat->harga, 0, ',', '.') }}</li>
                        <li class="list-group-item"><strong>Expired Date:</strong> {{ $obat->expired_date ?? $obat->expired_at }}</li>
                    </ul>
                    <div class="d-flex justify-content-between gap-2">
                        <a href="{{ route('obat.edit', $obat->id) }}" class="btn btn-primary px-4">Edit</a>
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4">Hapus</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
