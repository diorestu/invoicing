<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm" id="myTable">
        <thead class="table-dark">
            <tr>
                <th class="text-white">{{ __('No') }}</th>
                <th class="text-white">{{ __('Nama Lengkap') }}</th>
                <th class="text-white">{{ __('Nama Bank') }}</th>
                <th class="text-white">{{ __('No Rekening') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $i->nama_pt }}</td>
                    <td>{{ $i->nama_bank }}</td>
                    <td>{{ $i->no_rek }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form method="POST" class="d-none" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</div>


@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.6/fc-4.3.0/fh-3.4.0/r-2.5.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.6/fc-4.3.0/fh-3.4.0/r-2.5.0/sl-1.7.0/datatables.min.js"></script>
    <script>
        let table = new DataTable('#myTable', {
            lengthMenu: [20, 35, 50, 100],
            "dom": '<"my-0"t><"d-flex justify-content-between align-items-start mx-0 mb-0 mt-3"lp>',
            "language": {
                "sSearch": "Cari:",
                "decimal": ",",
                "emptyTable": "<div class='text-center'>Tidak Ada Data Tersedia</div>",
                "info": "Menampilkan _START_ s/d _END_ dari _TOTAL_ data",
                "infoEmpty": "Menampilkan 0 s/d 0 dari 0 data",
                "infoFiltered": "(difiliter dari _MAX_ data)",
                "infoPostFix": "",
                "thousands": ".",
                "lengthMenu": "_MENU_",
                "loadingRecords": "Memuat...",
                "processing": "<i class='fa fa-spinner fa-spin fa-fw'></i>",
                "search": "Cari:",
                "zeroRecords": "Tidak ada data yang sesuai",
            },
        });
        $('#search').keyup(function() {
            table.search($(this).val()).draw();
        });
    </script>
    <script>
        function del(element) {
            event.preventDefault();
            let form = document.getElementById('delete-form');
            form.setAttribute('action', element.getAttribute('href'))
            swalConfirm('Yakin Menghapus User Ini ?', `Data tidak akan bisa dikembalikan`, 'Ya', () => {
                form.submit()
            })
        }
    </script>
@endpush
