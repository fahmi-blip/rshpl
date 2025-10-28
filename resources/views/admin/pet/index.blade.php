
    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; width:90%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Tanggal Lahir</th>
                <th>Warna Tanda</th>
                <th>Jenis Kelamin</th>
                <th>Pemilik</th>
                <th>ID Ras Hewan</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($pet))
                @foreach ($pet as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item -> nama }}</td>
                        <td>{{ $item -> tanggal_lahir }}</td>
                        <td>{{ $item -> warna_tanda }}</td>
                        <td>{{ $item -> jenis_kelamin }}</td>
                        <td>{{ $item ->pemilik->nama }}</td>
                        <td>{{ $item ->rasHewan->nama_ras}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak ada data jenis hewan.</td>
                </tr>
             @endif
        </tbody>
    </table>

