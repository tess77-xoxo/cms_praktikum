<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ObatImage;

class ObatImageController extends Controller
{
    public function create()
    {
        return view('upload-obat'); // view untuk form upload
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_obat' => 'required|string|max:100',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan file gambar ke direktori storage/app/public/images
        $imagePath = $request->file('image')->store('images', 'public');

        // Simpan data ke database
        $obatImage = ObatImage::create([
            'nama_obat'  => $request->nama_obat,
            'image_path' => $imagePath,
        ]);

        // Kembalikan ke view dengan pesan sukses
        return view('upload-obat', ['obat' => $obatImage])
               ->with('success', 'Gambar obat berhasil diupload');
    }
}
