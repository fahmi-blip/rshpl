<aside class="sidebar">
  <h2 class="sidebar-logo">RSHP</h2>
  <ul class="sidebar-menu">
    <li><a href="{{ route('admin.pet.index') }}" >Data Hewan Peliharaan</a></li>
    <li><a href="{{ route('admin.role-user.index') }}" class="active">Penetapan Role User</a></li> <li><a href="{{ route('login') }}" class="logout-btn">Logout</a></li>
  </ul>
</aside>
<main class="main-content">
  <header class="main-header">
    <h1>Tetapkan Role ke User</h1>
  </header>
  
  <div class="form-container">
    <form action="{{ route('admin.role-user.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="iduser">User</label>
            <select id="iduser" name="iduser" required>
                <option value="">Pilih User</option>
                @foreach($users as $user)
                    <option value="{{ $user->iduser }}">{{ $user->nama }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idrole">Role</label>
            <select id="idrole" name="idrole" required>
                <option value="">Pilih Role</option>
                @foreach($roles as $role)
                    <option value="{{ $role->idrole }}">{{ $role->nama_role }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <input type="text" id="status" name="status" value="aktif" required>
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
    </form>
  </div>
</main>