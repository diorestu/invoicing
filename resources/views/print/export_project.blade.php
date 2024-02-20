<table>
    <thead>
        <tr>
            <th>Nama Perusahaan</th>
            <th>Deskripsi</th>
            <th>No. Telp</th>
            <th>Nama PIC</th>
            <th>Ditambahkan Pada</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($project as $item)
            <tr>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->deskripsi }}</td>
                <td>{{ $item->telp }}</td>
                <td>{{ $item->pic }}</td>
                <td>{{ Carbon\Carbon::parse($item->created_at)->locale('id')->diffForHumans() }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
