<h1>Daftar Obat</h1>

@if (session('success'))
    <p style="color: green">{{ session('success') }}</p>
@endif

<a href="{{ route('obat.create') }}">Tambah Obat</a>

<ul>
    @foreach($data as $obat)
        <li>
            {{ $obat->nama_obat }} - {{ $obat->jenis }} - {{ $obat->stok }} - Rp{{ number_format($obat->harga, 0, ',', '.') }} - Exp: {{ $obat->expired_date }}
            <a href="{{ route('obat.edit', $obat->id) }}">Edit</a>
            <form action="{{ route('obat.destroy', $obat->id) }}" method="POST" style="display:inline">
                @csrf
                @method('DELETE')
                <button type="submit">Hapus</button>
            </form>
        </li>
    @endforeach
</ul>
