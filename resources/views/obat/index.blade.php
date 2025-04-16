<h1>Daftar Obat (Dummy)</h1>
<a href="{{ route('obat.create') }}">+ Tambah Obat</a>
<br><br>

<table border="1" cellpadding="10">
    <tr>
        <th>Nama</th>
        <th>Jenis</th>
        <th>Stok</th>
        <th>Harga</th>
        <th>Aksi</th>
    </tr>
    @foreach ($data as $item)
    <tr>
        <td>{{ $item['nama'] }}</td>
        <td>{{ $item['jenis'] }}</td>
        <td>{{ $item['stok'] }}</td>
        <td>{{ $item['harga'] }}</td>
        <td>
            <a href="{{ route('obat.show', $item['id']) }}">Lihat</a> |
            <a href="{{ route('obat.edit', $item['id']) }}">Edit</a> |
            <form action="{{ route('obat.destroy', $item['id']) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Yakin hapus data ini?')">Hapus</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
