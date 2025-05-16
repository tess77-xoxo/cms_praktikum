@extends('layouts.app')

@section('title', 'Tambah Obat')

@section('content')
<a href="{{ route('obat.create') }}">Tambah Data</a>

    <form action="{{ route('obat.store') }}" method="POST">
        @csrf

        <div>
            <label for="nama">Nama Obat</label><br>
            <input type="text" name="nama" id="nama" required>
        </div>

        <div>
            <label for="jenis">Jenis Obat</label><br>
            <input type="text" name="jenis" id="jenis" required>
        </div>

        <div>
            <label for="stok">Stok</label><br>
            <input type="number" name="stok" id="stok" required>
        </div>

        <div>
            <label for="harga">Harga</label><br>
            <input type="number" name="harga" id="harga" required>
        </div>

        <br>
        <button type="submit">Simpan</button>
        <a href="{{ route('obat.index') }}">Batal</a>
    </form>
@endsection
