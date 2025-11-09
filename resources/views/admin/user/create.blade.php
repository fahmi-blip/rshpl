<aside class="sidebar">
  <h2 class="sidebar-logo">RSHP</h2>
  <ul class="sidebar-menu">
    <li><a href="{{ route('admin.tindakan-terapi.index') }}">Tindakan & Terapi</a></li>
    <li><a href="{{ route('admin.user.index') }}" class="active">Manajemen User</a></li> <li><a href="{{ route('admin.role.index') }}" >Manajemen Role</a></li>
    </ul>
</aside>
<main class="main-content">
  <header class="main-header">
    <h1>Tambah Data User Baru</h1>
  </header>
  
  <div class="form-container">
    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" id="nama" name="nama" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
    </form>
  </div>
</main>