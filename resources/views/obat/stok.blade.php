@extends('layouts.app')

@section('title', 'Stok Obat Utama')

@section('content')
<script>document.body.classList.remove('login-apotek-bg');document.body.classList.add('stok-obat-bg');</script>
<div class="container mt-5">
    <div class="mb-4">
        <h1 class="judul-stok">Stok Obat Utama</h1>
        <link rel="stylesheet" href="{{ asset('css/custom-obat.css') }}">
    </div>
    <div class="stok-card p-4">
        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle mb-0">
                <thead class="table-primary">
                    <tr>
                        <th scope="col" class="text-center">Nama Obat</th>
                        <th scope="col" class="text-center">Stok</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($stokObats as $nama => $stok)
                    <tr>
                        <td class="text-center">{{ $nama }}</td>
                        <td class="text-center"><span class="badge badge-stok">{{ $stok }}</span></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('obat.index') }}" class="btn btn-kembali px-4 py-2">Kembali ke Daftar Obat</a>
        </div>
    </div>
</div>
@endsection 