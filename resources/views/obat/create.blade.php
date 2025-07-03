@extends('layouts.app')
@section('title', 'Tambah Obat')
@section('content')
<div class="container mt-4">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <div class="card shadow-lg rounded-4">
        <div class="card-header bg-primary text-white fw-bold rounded-top-4">Tambah Obat</div>
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger">
              <ul class="mb-0">
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif
          <form action="{{ route('obat.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="nama" class="form-label">Nama Obat</label>
              <input type="text" name="nama" id="nama" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="jenis" class="form-label">Jenis Obat</label>
              <input type="text" name="jenis" id="jenis" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="stok" class="form-label">Stok</label>
              <input type="number" name="stok" id="stok" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="harga" class="form-label">Harga</label>
              <input type="number" name="harga" id="harga" class="form-control" required>
            </div>
            <div class="mb-3">
              <label for="expired_date" class="form-label">Expired Date</label>
              <input type="date" name="expired_date" id="expired_date" class="form-control" required>
            </div>
            <div class="d-flex justify-content-between gap-2">
              <button type="submit" class="btn btn-success px-4">Simpan</button>
              <a href="{{ route('obat.index') }}" class="btn btn-secondary px-4">Batal</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection