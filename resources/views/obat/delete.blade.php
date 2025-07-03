@extends('layouts.app')
@section('title', 'Konfirmasi Hapus')
@section('content')
<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card shadow-lg border-danger rounded-4">
        <div class="card-header bg-danger text-white fw-bold rounded-top-4">Konfirmasi Hapus Obat</div>
        <div class="card-body">
          <h5 class="mb-3">Yakin ingin menghapus obat ini?</h5>
          <ul class="list-group mb-3">
            <li class="list-group-item"><strong>Nama:</strong> {{ $obat->nama_obat ?? $obat->nama ?? '-' }}</li>
            <li class="list-group-item"><strong>Stok:</strong> {{ $obat->stok }}</li>
            <li class="list-group-item"><strong>Harga:</strong> Rp{{ number_format($obat->harga, 0, ',', '.') }}</li>
          </ul>
          <div class="d-flex justify-content-between gap-2">
            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger px-4">Ya, Hapus</button>
            </form>
            <a href="{{ route('obat.index') }}" class="btn btn-secondary px-4">Batal</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection