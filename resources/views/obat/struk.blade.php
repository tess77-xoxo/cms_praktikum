@extends('layouts.app')

@section('title', 'Struk Obat')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">
            <div class="card shadow-lg rounded-4">
                <div class="card-header bg-success text-white fw-bold rounded-top-4">Struk Obat</div>
                <div class="card-body">
                    <table class="table table-borderless mb-4">
                        <tr>
                            <th>Nama Obat</th>
                            <td>: {{ $obat->nama_obat ?? '-' }}</td>
                        </tr>
                        <tr>
                            <th>Jenis</th>
                            <td>: {{ $obat->jenis }}</td>
                        </tr>
                        <tr>
                            <th>Stok</th>
                            <td>: {{ $obat->stok }}</td>
                        </tr>
                        <tr>
                            <th>Harga</th>
                            <td>: Rp{{ number_format($obat->harga, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <th>Expired Date</th>
                            <td>: {{ $obat->expired_date }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Simpan</th>
                            <td>: {{ $obat->created_at->format('d-m-Y H:i') }}</td>
                        </tr>
                    </table>
                    <div class="alert alert-info text-end fw-bold fs-5">
                        Biaya Obat: Rp{{ number_format($obat->harga * $obat->stok, 0, ',', '.') }}
                    </div>
                    <div class="alert alert-secondary text-end fw-bold">
                        Harga per Satu Obat: Rp{{ number_format($obat->harga, 0, ',', '.') }}
                    </div>
                    <div class="d-flex justify-content-between gap-2">
                        <a href="{{ route('obat.index') }}" class="btn btn-secondary px-4">Kembali</a>
                        <button onclick="window.print()" class="btn btn-success px-4">Cetak Struk</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 