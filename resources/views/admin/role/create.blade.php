<aside class="sidebar">
  <h2 class="sidebar-logo">RSHP</h2>
  <ul class="sidebar-menu">
    <li><a href="{{ route('admin.role.index') }}" class="active">Manajemen Role</a></li> <li><a href="{{ route('admin.pet.index') }}" >Data Hewan Peliharaan</a></li>
    <li><a href="{{ route('admin.role-user.index') }}">Penetapan Role User</a></li>
    <li><a href="{{ route('login') }}" class="logout-btn">Logout</a></li>
  </ul>
</aside>
<main class="main-content">
  <header class="main-header">
    <h1>Tambah Data Role Baru</h1>
  </header>
  
  <div class="form-container">
    <form action="{{ route('admin.role.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_role">Nama Role</label>
            <input type="text" id="nama_role" name="nama_role" required>
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
    </form>
  </div>
</main>