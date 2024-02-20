<table>
    <thead>
        <tr>
            <th>Nama Site</th>
            <th>Keterangan</th>
            <th>No. Kontrak</th>
            <th>Tgl. Kontrak</th>
            <th>Tgl. Penagihan</th>
            <th>Lama Kontrak</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($contract as $item)
            <tr>
                <td>{{ $item->project->nama }}</td>
                <td>{{ $item->keterangan }}</td>
                <td>{{ $item->no_kontrak }}</td>
                <td>{{ $item->tgl_kontrak }}</td>
                <td>{{ $item->tgl_penagihan }}</td>
                <td>{{ $item->lama_kontrak }} Bulan</td>
            </tr>
        @endforeach
    </tbody>
</table>
