<nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4">
  <div class="container">
    <a class="navbar-brand fw-bold" href="{{ route('obat.index') }}">Manajemen Obat</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('obat.index') }}">Daftar Obat</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('obat.create') }}">Tambah Obat</a>
        </li>
      </ul>
      @auth
      <form action="{{ route('logout') }}" method="POST" class="d-flex ms-auto">
        @csrf
        <button type="submit" class="btn btn-outline-light">Logout</button>
      </form>
      @endauth
    </div>
  </div>
</nav>
<hr>
