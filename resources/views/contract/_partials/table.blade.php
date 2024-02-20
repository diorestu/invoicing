<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm" id="myTable">
        <thead class="table-dark">
            <tr>
                <th class="text-white">No</th>
                <th class="text-white">{{ __('Nama Klien') }}</th>
                <th class="text-white">{{ __('Keterangan') }}</th>
                <th class="text-white">{{ __('Lama Kontrak') }}</th>
                <th class="text-white">{{ __('Nominal') }}</th>
                <th class="text-white">{{ __('Tipe') }}</th>
                <th class="text-white">{{ __('status') }}</th>
                <th class="text-white">{{ __('Menu') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $i->project->nama ?? '-' }}</td>
                    <td>{{ $i->nama_pekerjaan }}</td>
                    <td>{{ $i->lama_kontrak }}</td>
                    <td>{{ $i->nominal_kontrak }}</td>
                    <td class="text-center">{{ $i->tipe }}</td>
                    <td class="text-center">
                        {!! $i->status == 'accept'
                            ? '<small class="text-white bg-success">Disetujui</small>'
                            : ($i->status == 'pending'
                                ? '<small class="text-muted">Pending</small>'
                                : '<small class="text-white bg-danger">Ditolak</small>') !!}
                    </td>
                    <td class="text-center">
                        @if ($i->tipe == 'pekerjaan')
                            {!! actionBtn(route('contract.show-pekerjaan', $i->id), 'outline-secondary', 'info-circle') !!}
                        @else
                            {!! actionBtn(route('contract.show', $i->id), 'outline-secondary', 'info-circle') !!}
                        @endif
                        {{-- {!! actionBtn(route('contract.delete', $i->id), 'danger', 'trash', ["onclick='del(this)'"]) !!} --}}
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Delete forms with javascript -->
    <form method="POST" class="d-none" id="delete-form">
        @csrf
        @method('DELETE')
    </form>
</div>

@push('css')
    <link href="https://cdn.datatables.net/v/bs5/dt-1.13.7/b-2.4.2/fc-4.3.0/fh-3.4.0/r-2.5.0/sl-1.7.0/datatables.min.css"
        rel="stylesheet">
@endpush
@push('js')
    <script src="https://cdn.datatables.net/v/bs5/dt-1.13.7/b-2.4.2/fc-4.3.0/fh-3.4.0/r-2.5.0/sl-1.7.0/datatables.min.js">
    </script>
    <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
    <script>
        let table = new DataTable('#myTable', {
            columnDefs: [{
                    targets: 4,
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp '),
                },
                {
                    targets: 3,
                    render: function(data, type, full, meta) {
                        return +data + ' Bulan';
                    },
                }
            ],
            order: [
                [0, 'asc']
            ],
            lengthMenu: [25, 50, 75,100],
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
            swalConfirm('Are you sure ?', `You won't be able to revert this.`, 'Yes, delete it!', () => {
                form.submit()
            })
        }
    </script>
    {{-- <script>
        $(document).ready(function() {
            $('#delete-selected').on('click', function() {
                var selectedRows = table.rows({
                    selected: true
                }).data();
                var selectedIds = [];

                $.each(selectedRows, function(index, row) {
                    selectedIds.push(row.id);
                    alert(selectedIds);
                })

                // $.ajax({

                // })
            });
        });
    </script> --}}
@endpush
