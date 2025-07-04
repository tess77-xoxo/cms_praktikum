<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;

class ObatController extends Controller
{
    // Tampilkan semua data obat
    public function index()
    {
        $obats = Obat::all();
        foreach ($obats as $obat) {
            if ($obat->images && $obat->images->count()) {
                $obat->gambar_obat = 'storage/' . $obat->images->first()->path;
            } else {
                $slug = strtolower(str_replace(' ', '-', $obat->nama_obat ?? $obat->nama ?? ''));
                $imgPath = 'images/' . $slug . '.png';
                if (file_exists(public_path($imgPath))) {
                    $obat->gambar_obat = $imgPath;
                } else {
                    $obat->gambar_obat = 'images/no-image.png';
                }
            }
        }
        return view('obat.index', compact('obats'));
    }

    // Tampilkan form tambah obat
    public function create()
    {
        return view('obat.create');
    }

    // Simpan data obat baru (simulasi)
    public function store(Request $request)
    {
        // Validasi input data obat
        $validated = $request->validate([
            'nama'  => 'required|string|max:100',
            'jenis' => 'required|string|max:100',
            'stok'  => 'required|integer|min:1',
            'harga' => 'required|numeric|min:0',
            'expired_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan data obat ke database
        $obat = Obat::create([
            'nama_obat' => $request->nama,
            'jenis' => $request->jenis,
            'stok' => $request->stok,
            'harga' => $request->harga,
            'expired_date' => $request->expired_date,
        ]);

        // Simpan gambar jika ada
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            Image::create([
                'obat_id' => $obat->id,
                'path' => $imagePath,
            ]);
        }

        // Redirect ke halaman struk
        return redirect()->route('obat.struk', $obat->id);
    }

    // Tampilkan detail 1 obat
    public function show($id)
    {
        $obat = Obat::find($id);
        if (!$obat) {
            return abort(404);
        }
        return view('obat.show', compact('obat'));
    }

    // Tampilkan form edit obat
    public function edit($id)
    {
        $obat = Obat::find($id);
        if (!$obat) {
            return abort(404);
        }
        return view('obat.edit', compact('obat'));
    }

    // Simpan perubahan data (simulasi)
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_obat' => 'required',
            'jenis' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'expired_date' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->only(['nama_obat', 'jenis', 'stok', 'harga', 'expired_date']));

        // Jika ada upload gambar baru
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            Image::create([
                'obat_id' => $obat->id,
                'path' => $imagePath,
            ]);
        }

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil diupdate');
    }

    // Hapus data obat (simulasi)
    public function destroy($id)
    {
        $obat = Obat::findOrFail($id);

        // Hapus gambar terkait dari storage dan database
        foreach ($obat->images as $image) {
            Storage::disk('public')->delete($image->path);
            $image->delete();
        }

        // Hapus data obat
        $obat->delete();

        return redirect()->route('obat.index')->with('success', 'Data obat berhasil dihapus');
    }

    // Tampilkan halaman stok obat
    public function stok()
    {
        $namaObats = ['paracetamol', 'amoxilin', 'vitamin'];
        $stokObats = [];
        foreach ($namaObats as $nama) {
            $stokObats[ucfirst($nama)] = Obat::whereRaw('LOWER(nama_obat) = ?', [$nama])->sum('stok');
        }
        return view('obat.stok', compact('stokObats'));
    }

    // Tampilkan struk obat
    public function struk($id)
    {
        $obat = Obat::findOrFail($id);
        return view('obat.struk', compact('obat'));
    }
}
