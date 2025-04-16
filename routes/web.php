<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;

// Redirect root ke halaman daftar obat
Route::get('/', function () {
    return redirect('/obat');
});

// Tampilkan seluruh data obat
Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');

// Tampilkan form tambah obat
Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');

// Proses simpan data obat (simulasi dengan dummy data)
Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');

// Tampilkan detail satu obat
Route::get('/obat/{id}', [ObatController::class, 'show'])->name('obat.show');

// Tampilkan form edit obat
Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');

// Proses update data obat (simulasi)
Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');

// Proses hapus data obat (simulasi)
Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
