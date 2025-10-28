
    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; width:90%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Jenis</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($jenisHewan))
                @foreach ($jenisHewan as $index => $hewan)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $hewan -> nama_jenis_hewan }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak ada data jenis hewan.</td>
                </tr>
             @endif
        </tbody>
    </table>

