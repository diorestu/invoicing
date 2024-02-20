<div class="table-responsive">
    <table class="table table-striped table-bordered table-sm" id="myTable">
        <thead class="table-dark">
            <tr>
                <th class="text-white">{{ __('Nama Klien') }}</th>
                <th class="text-white">{{ __('Tipe Kontrak') }}</th>
                <th class="text-white">{{ __('Nominal') }}</th>
                <th class="text-white">{{ __('Bulan Bayar') }}</th>
                <th class="text-white">{{ __('Tahun Bayar') }}</th>
                <th class="text-white">{{ __('status') }}</th>
                <th class="text-white">{{ __('Menu') }}</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $i)
                <tr>
                    <td>{{ $i->contract->project->nama ?? '-' }}</td>
                    <td class="text-center">
                        <div class="badge bg-primary">{{ $i->contract->tipe ?? '-' }}</div>
                    </td>
                    <td>{{ $i->nominal }}</td>
                    <td>{{ BulanOnly($i->period) }}</td>
                    <td>{{ TahunOnly($i->period) }}</td>
                    <td class="text-center">
                        @if ($i->status == 'dibayar')
                            <div class="badge bg-success">{{ $i->status }}</div>
                        @elseif ($i->status == 'terbit')
                            <div class="badge bg-dark">{{ $i->status }}</div>
                        @elseif ($i->status == 'cetak')
                            <div class="badge bg-info">{{ $i->status }}</div>
                        @elseif ($i->status == 'overdue')
                            <div class="badge bg-danger">{{ $i->status }}</div>
                        @elseif ($i->status == 'diterima')
                            <div class="badge bg-primary">{{ $i->status }}</div>
                        @else
                            <div class="badge bg-secondary">{{ $i->status }}</div>
                        @endif
                    </td>
                    <td class="text-center">
                        <form action="{{ route('invoice.ubah.status', $i->id) }}" method="post">
                            @csrf
                            @method('POST')

                            @if ($i->status == 'pending')
                                @if ($i->detail)
                                    <input type="hidden" name="status" value="terbit">
                                    <button type="submit" class="btn btn-sm btn-dark text-white me-2">
                                        Terbitkan
                                    </button>
                                @elseif(!$i->detail && $i->contract->tipe == 'pekerjaan')
                                    <a class="btn btn-sm btn-outline-danger me-2"
                                        href="{{ route('invoice.generate', $i->id) }}">
                                        <i class="bx bxs-pencil me-2"></i>Generate Invoice
                                    </a>
                                    {{-- <a class="btn btn-sm btn-secondary text-white me-2"
                                        href="{{ route('invoice.show', $i->id) }}">
                                        <i class="bx bxs-pencil me-2 bx-xs"></i>Buat Invoice
                                    </a> --}}
                                @else
                                    <input type="hidden" name="status" value="terbit">
                                    <button type="submit" class="btn btn-sm btn-dark text-white me-2">
                                        Terbitkan
                                    </button>
                                @endif
                            @elseif($i->status == 'terbit')
                                <input type="hidden" name="status" value="cetak">
                                <button type="submit" class="btn btn-sm btn-dark text-white me-2">
                                    Tandai Cetak
                                </button>
                            @elseif($i->status == 'cetak')
                                <input type="hidden" name="status" value="diterima">
                                <button type="submit" class="btn btn-sm btn-dark text-white me-2">
                                    Tandai Terima Invoice
                                </button>
                            @elseif($i->status == 'diterima')
                                <input type="hidden" name="status" value="dibayar">
                                <a class="btn btn-sm btn-danger text-white me-2"
                                    href="{{ route('invoice.ubah.overdue', $i->id) }}">
                                    <i class="bx bxs-pencil me-2"></i>Set Overdue
                                </a>
                                <button type="submit" class="btn btn-sm btn-dark text-white me-2">
                                    Tandai Bayar
                                </button>
                            @elseif($i->status == 'overdue')
                                <input type="hidden" name="status" value="dibayar">
                                <button type="submit" class="btn btn-sm btn-dark text-white me-2">
                                    Tandai Bayar
                                </button>
                            @endif
                            {{-- <a class="btn btn-sm btn-danger text-white me-2"
                                    href="{{ route('invoice.generate', $i->id) }}">
                                    <i class="bx bxs-pencil me-2"></i>Generate Invoice
                                </a> --}}
                            <a class="btn btn-sm btn-outline-secondary me-2"
                                href="{{ route('invoice.show', $i->id) }}">
                                <i class="bx bx-detail bx-xs"></i>
                            </a>

                        </form>
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
                "paginate": {
                    "first": "Awal",
                    "last": "Akhir",
                    "next": "Selanjutnya",
                    "previous": "Sebelumnya"
                },
            },
            columnDefs: [{
                    targets: 2,
                    render: $.fn.dataTable.render.number('.', ',', 0, 'Rp '),
                    className: 'text-end'
                },
                // {
                //     targets: 2,
                //     render: function(data, type, full, meta) {
                //         return +data + ' Bulan';
                //     },
                // }
            ],
        });

        $('#search').keyup(function() {
            table.search($(this).val()).draw();
        });
    </script>
@endpush
@push('js')
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
@endpush
