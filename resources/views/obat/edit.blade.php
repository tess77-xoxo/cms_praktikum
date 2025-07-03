@extends('layouts.app')

@section('title', 'Edit Obat')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-primary text-white fw-bold rounded-top-4">Edit Obat</div>
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
                    <form method="POST" action="{{ route('obat.update', $obat->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Nama Obat</label>
                            <input type="text" name="nama_obat" class="form-control" value="{{ old('nama_obat', $obat->nama_obat ?? $obat->nama ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis</label>
                            <input type="text" name="jenis" class="form-control" value="{{ old('jenis', $obat->jenis ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Stok</label>
                            <input type="number" name="stok" class="form-control" value="{{ old('stok', $obat->stok ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{ old('harga', $obat->harga ?? '') }}" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Expired Date</label>
                            <input type="date" name="expired_date" class="form-control" value="{{ old('expired_date', $obat->expired_date ?? '') }}" required>
                        </div>
                        @if(isset($obat->images) && $obat->images->count())
                            <div class="mb-3">
                                <label class="form-label">Gambar Saat Ini:</label>
                                <div class="d-flex flex-wrap gap-2">
                                    @foreach($obat->images as $img)
                                        <img src="{{ asset('storage/' . $img->path) }}" alt="gambar obat" width="100" class="rounded border">
                                    @endforeach
                                </div>
                            </div>
                        @endif
                        <div class="d-flex justify-content-between gap-2">
                            <button type="submit" class="btn btn-success px-4">Simpan</button>
                            <a href="{{ route('obat.show', $obat->id) }}" class="btn btn-secondary px-4">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
