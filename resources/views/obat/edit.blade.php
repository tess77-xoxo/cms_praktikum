<h1>Edit Obat</h1>

<form action="{{ route('obat.update', $obat['id']) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nama:</label><br>
    <input type="text" name="nama" value="{{ $obat['nama'] }}"><br><br>

    <label>Jenis:</label><br>
    <input type="text" name="jenis" value="{{ $obat['jenis'] }}"><br><br>

    <label>Stok:</label><br>
    <input type="number" name="stok" value="{{ $obat['stok'] }}"><br><br>

    <label>Harga:</label><br>
    <input type="number" name="harga" value="{{ $obat['harga'] }}"><br><br>

    <button type="submit">Update</button>
</form>

<br>
<a href="{{ route('obat.index') }}">← Kembali ke daftar</a>
