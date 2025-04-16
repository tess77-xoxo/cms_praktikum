<h1>Tambah Obat</h1>

<form action="{{ route('obat.store') }}" method="POST">
    @csrf
    <label>Nama:</label><br>
    <input type="text" name="nama"><br><br>

    <label>Jenis:</label><br>
    <input type="text" name="jenis"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga"><br><br>

    <button type="submit">Simpan</button>
</form>

<br>
<a href="{{ route('obat.index') }}">← Kembali ke daftar</a>
