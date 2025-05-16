<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Obat;

class ObatController extends Controller
{
    // Tampilkan semua data obat
    public function index()
    {
        $data = Obat::all();
        return view('obat.index', compact('data'));
    }

    // Tampilkan form tambah obat
    public function create()
    {
        return view('obat.create');
    }

    // Simpan data obat baru (simulasi)
    public function store(Request $request)
    {
        $request->validate([
            'nama_obat' => 'required',
            'jenis' => 'required',
            'stok' => 'required|integer',
            'harga' => 'required|numeric',
            'expired_date' => 'required|date',
        ]);

        // Dummy: tidak disimpan beneran
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil "disimpan" (simulasi)');
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
        ]);

        $obat = Obat::findOrFail($id);
        $obat->update($request->all());
        
        // Dummy: tidak diupdate beneran
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil "diupdate" (simulasi)');
    }

    // Hapus data obat (simulasi)
    public function destroy($id)
    {
        // Dummy: tidak dihapus beneran
        return redirect()->route('obat.index')->with('success', 'Data obat berhasil "dihapus" (simulasi)');
    }
}
