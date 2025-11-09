<aside class="sidebar">
  <h2 class="sidebar-logo">RSHP</h2>
  <ul class="sidebar-menu">
    <li><a href="{{ route('admin.dashboard') }}" >Dashboard</a></li>
    <li><a href="{{ route('admin.jenis-hewan.index') }}" >Jenis Hewan</a></li>
    <li><a href="{{ route('admin.pemilik.index') }}" >Pemilik</a></li>
    <li><a href="{{ route('admin.ras-hewan.index') }}" class="active">Ras Hewan</a></li> <li><a href="{{ route('login') }}" class="logout-btn">Logout</a></li>
  </ul>
</aside>
<main class="main-content">
  <header class="main-header">
    <h1>Tambah Data Ras Hewan Baru</h1>
  </header>
  
  <div class="form-container">
    <form action="{{ route('admin.ras-hewan.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nama_ras">Nama Ras</label>
            <input type="text" id="nama_ras" name="nama_ras" required>
        </div>
        <div class="form-group">
            <label for="idjenis_hewan">Jenis Hewan</label>
            <select id="idjenis_hewan" name="idjenis_hewan" required>
                <option value="">Pilih Jenis Hewan</option>
                @foreach($jenisHewan as $item)
                    <option value="{{ $item->idjenis_hewan }}">{{ $item->nama_jenis_hewan }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
    </form>
  </div>
</main>