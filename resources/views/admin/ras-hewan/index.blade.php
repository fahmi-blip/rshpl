
    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; width:90%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Ras</th>
                <th>ID Jenis Hewan</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($rasHewan))
                @foreach ($rasHewan as $index => $ras)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $ras -> nama_ras }}</td>
                        <td>{{ $ras -> idjenis_hewan }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak ada data jenis hewan.</td>
                </tr>
             @endif
        </tbody>
    </table>

