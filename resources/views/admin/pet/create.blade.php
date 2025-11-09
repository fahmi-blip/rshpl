<main class="main-content">
  <header class="main-header">
    <h1>Tambah Data Tindakan & Terapi Baru</h1>
  </header>
  
  <div class="form-container">
    <form action="{{ route('admin.tindakan-terapi.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="kode">Kode</label>
            <input type="text" id="kode" name="kode" required>
        </div>
        <div class="form-group">
            <label for="deskripsi_tindakan_terapi">Deskripsi</label>
            <textarea id="deskripsi_tindakan_terapi" name="deskripsi_tindakan_terapi" rows="4"></textarea>
        </div>
        <div class="form-group">
            <label for="idkategori">Kategori</label>
            <select id="idkategori" name="idkategori" required>
                <option value="">Pilih Kategori</option>
                @foreach($kategori as $item)
                    <option value="{{ $item->idkategori }}">{{ $item->nama_kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idkategori_klinis">Kategori Klinis</label>
            <select id="idkategori_klinis" name="idkategori_klinis" required>
                <option value="">Pilih Kategori Klinis</option>
                @foreach($kategoriKlinis as $item)
                    <option value="{{ $item->idkategori_klinis }}">{{ $item->nama_kategori_klinis }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-submit">Simpan</button>
    </form>
  </div>
</main>