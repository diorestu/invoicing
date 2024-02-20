<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm" id="myTable">
        <thead class="table-dark">
            <tr>
                <th class="text-white">{{ __('No') }}</th>
                <th class="text-white">{{ __('Nama Klien') }}</th>
                <th class="text-white">{{ __('Kategori') }}</th>
                {{-- <th class="text-white">{{ __('Keterangan') }}</th> --}}
                <th class="text-white">{{ __('Vendor') }}</th>
                <th class="text-white">{{ __('No. Telp') }}</th>
                <th width="9%" class="text-center text-white">{{ __('Menu') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
                <tr>
                    <td width="2%" class="text-center">{{ $loop->iteration }}</td>
                    <td width="35%"><span class="fw-bolder">{{ $i->nama }}</span></td>
                    <td>{{ $i->kategori }}</td>
                    {{-- <td>{{ $i->deskripsi }}</td> --}}
                    <td>
                        <p class="mb-0 text-black fw-bold">
                            {{ $i->idvendor->nama_pt }}
                        </p>
                        <small>{{ $i->idvendor->nama_bank . ' - ' . $i->idvendor->no_rek }}</small>

                    </td>
                    <td>{{ $i->telp }}</td>
                    <td class="d-flex justify-content-between align-items-center">
                        <a href="{{ route('client.edit', $i->id) }}"
                            class="btn btn-xs btn-dark text-white me-2">Ubah</a>
                        <a onclick='del(this)' href="{{ route('client.delete', $i->id) }}"
                            class="btn btn-xs btn-outline-danger">Hapus</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Delete forms with javascript -->
    <form method="post" class="d-none" id="delete-form">
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
            lengthMenu: [15, 25, 50],
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
        $('#fl_cabang').on('change', function() {
            table.columns(2).search($(this).val()).draw();
        });
    </script>
@endpush
@push('js')
    <script>
        function del(element) {
            event.preventDefault();
            let form = document.getElementById('delete-form');
            form.setAttribute('action', element.getAttribute('href'))
            swalConfirm('Yakin Menghapus Client Ini ?', `Data tidak akan bisa dikembalikan`, 'Ya', () => {
                form.submit()
            })
        }
    </script>
@endpush
