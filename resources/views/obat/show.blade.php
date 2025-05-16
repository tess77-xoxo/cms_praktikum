@extends('layouts.app')

@section('title', $obat->nama)

@section('content')
    <h1>{{ $obat->nama }}</h1>
    <p>Stok: {{ $obat->stok }}</p>
    <p>Harga: Rp{{ number_format($obat->harga, 0, ',', '.') }}</p>

    <a href="/obat/{{ $obat->id }}/edit">Edit</a>
    <a href="{{ route('obat.delete', $obat->id) }}">🗑️ Hapus</a>
    <br><br>
    <a href="{{ route('obat.index') }}">← Kembali ke daftar</a>
@endsection
