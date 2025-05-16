@extends('layouts.app')

@section('title', 'Konfirmasi Hapus')

@section('content')
    <h1>Yakin ingin menghapus obat ini?</h1>

    <p><strong>{{ $obat->nama }}</strong></p>
    <p>Stok: {{ $obat->stok }}</p>
    <p>Harga: Rp{{ number_format($obat->harga, 0, ',', '.') }}</p>

    <button disabled>Ya, hapus (hanya simulasi)</button>
    <a href="{{ route('obat.show', $obat->id) }}">← Batal</a>
@endsection
