
    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; width:90%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode</th>
                <th>Deskripsi</th>
                <th>ID Kategori</th>
                <th>ID Kategori Klinis</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($tindakanTerapi))
                @foreach ($tindakanTerapi as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item-> kode }}</td>
                        <td>{{ $item-> deskripsi_tindakan_terapi}}</td>
                        <td>{{ $item->kategori->idkategori }}</td>
                        <td>{{ $item->kategoriKlinis->idkategori_klinis }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak ada data jenis hewan.</td>
                </tr>
             @endif
        </tbody>
    </table>

