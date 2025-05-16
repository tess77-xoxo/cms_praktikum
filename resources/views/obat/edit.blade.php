@extends('layouts.app')

@section('title', 'Edit Obat')

@section('content')
    <h1>Edit Obat</h1>

    <form>
        <label>Nama Obat:</label><br>
        <input type="text" name="nama" value="{{ $obat->nama }}"><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="{{ $obat->stok }}"><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" value="{{ $obat->harga }}"><br><br>

        <button type="submit" disabled>Simpan (hanya simulasi)</button>
    </form>

    <br>
    <a href="{{ route('obat.show', $obat->id) }}">← Kembali ke detail</a>
@endsection
