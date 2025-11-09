<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pemilik</title>
    <style>
        /* Salin CSS dari file index.blade.php jika diperlukan untuk styling */
        body { font-family: "Segoe UI", sans-serif; background-color: #f5f6fa; }
        .container { padding: 20px; }
        .card { background: #fff; border-radius: 8px; box-shadow: 0 2px 10px rgba(0,0,0,0.1); }
        .card-header { padding: 1rem; border-bottom: 1px solid #ddd; }
        .card-body { padding: 1rem; }
        .form-label { display: block; margin-bottom: 5px; font-weight: 600; }
        .form-control, .form-select { width: 100%; padding: 10px; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box; }
        .is-invalid { border-color: red; }
        .invalid-feedback { color: red; font-size: 0.9em; margin-top: 5px; }
        .btn { padding: 10px 20px; border: none; border-radius: 5px; cursor: pointer; text-decoration: none; display: inline-block; }
        .btn-primary { background-color: blue; color: white; }
        .btn-secondary { background-color: #6c757d; color: white; }
        .d-flex { display: flex; }
        .justify-content-between { justify-content: space-between; }
        .mb-3 { margin-bottom: 1rem; }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Tambah Pemilik</h4>
                    </div>
                    <div class="card-body">
                        
                        <form action="{{ route('admin.pemilik.store') }}" method="POST">
                            @csrf
                            
                            <div class="mb-3">
                                <label for="iduser" class="form-label">Nama User Pemilik</label>
                                <select class="form-select @error('iduser') is-invalid @enderror" 
                                        id="iduser" name="iduser" required>
                                    <option value="">Pilih User</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->iduser }}" {{ old('iduser') == $user->iduser ? 'selected' : '' }}>
                                            {{ $user->nama }} ({{ $user->email }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('iduser')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="no_wa" class="form-label">Nomor WA</label>
                                <input type="text"
                                    class="form-control @error('no_wa') is-invalid @enderror"
                                    id="no_wa" name="no_wa"
                                    value="{{ old('no_wa') }}" required>
                                @error('no_wa')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror"
                                          id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                            </div>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('admin.pemilik.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary ms-auto">
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>