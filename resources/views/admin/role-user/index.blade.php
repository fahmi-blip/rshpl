
    <table border="1" cellpadding="8" cellspacing="0" style="margin:auto; width:90%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Role</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @if (!empty($roleUser))
                @foreach ($roleUser as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item ->user->nama}}</td>
                        <td>{{ $item ->role->nama_role}}</td>
                        <td>{{ $item -> status }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3" style="text-align:center;">Tidak ada data jenis hewan.</td>
                </tr>
             @endif
        </tbody>
    </table>

