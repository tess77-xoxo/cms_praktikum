<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Auth;


Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'registerForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return 'Halo, ' . auth()->user()->name;
    });
    Route::get('/obat/stok', [ObatController::class, 'stok'])->name('obat.stok');
    Route::get('/obat', [ObatController::class, 'index'])->name('obat.index');
    Route::get('/obat/create', [ObatController::class, 'create'])->name('obat.create');
    Route::post('/obat', [ObatController::class, 'store'])->name('obat.store');
    Route::get('/obat/{id}', [ObatController::class, 'show'])->name('obat.show');
    Route::get('/obat/{id}/edit', [ObatController::class, 'edit'])->name('obat.edit');
    Route::get('/obat/{id}/struk', [ObatController::class, 'struk'])->name('obat.struk');
    Route::put('/obat/{id}', [ObatController::class, 'update'])->name('obat.update');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.destroy');
    Route::delete('/obat/{id}', [ObatController::class, 'destroy'])->name('obat.delete');
});

Route::get('/upload', [ImageController::class, 'create']);
Route::post('/upload', [ImageController::class, 'store'])->name('image.upload');
Route::resource('obat', ObatController::class);
// Tampilkan halaman login di root jika belum login, ke /obat jika sudah login
Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/obat');
    }
    return view('auth.login');
});