<h1>Detail Obat</h1>

<p><strong>Nama:</strong> {{ $obat['nama'] }}</p>
<p><strong>Jenis:</strong> {{ $obat['jenis'] }}</p>
<p><strong>Stok:</strong> {{ $obat['stok'] }}</p>
<p><strong>Harga:</strong> Rp{{ number_format($obat['harga'], 0, ',', '.') }}</p>

<br>
<a href="{{ route('obat.index') }}">← Kembali ke daftar</a>
