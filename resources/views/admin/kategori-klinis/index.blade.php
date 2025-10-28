
    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; width:90%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jenis</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($kategoriKlinis))
                @foreach ($kategoriKlinis as $index => $klinis)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $klinis -> nama_kategori_klinis }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak ada data jenis hewan.</td>
                </tr>
             @endif
        </tbody>
    </table>

