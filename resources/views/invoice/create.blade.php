@push('css')
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-daterangepicker.css') }}">
@endpush

<x-app-layout title="Generate Invoice">
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Generate Invoice') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('invoice.index') }}" class="btn btn-dark">
                    <i class="bx bx-arrow-back bx-xs"></i>
                    {{ __('Kembali') }}
                </a>
            </div>

            <form class="" action="{{ route('invoice.store') }}" method="post">
                @csrf
                @method('POST')

                <input type="hidden" name="id_invoice" value="{{ $data->id }}" />
                <input type="hidden" name="period" value="{{ $data->period }}" />
                <div class="row mt-1 mb-3 pb-3 mx-1 border-bottom">
                    <div class="col-md-4 mb-0">
                        <div class="form-group mb-2">
                            <label class="form-label mb-1">Tanggal Invoice</label>
                            <input type="date" name="tgl_terbit_inv" class="form-control"
                                value="{{ date('Y-m-d') }}">
                        </div>
                        <div class="mb-3">
                            <label for="dates" class="form-label">Periode Pekerjaan</label>
                            <input type="text" id="dates" class="form-control" />
                        </div>
                    </div>
                </div>
                <div class="row clone-row mt-1 mb-1">
                    <div class="col-md-7     mb-0 child-row">
                        <x-label for="uraian[]" :value="__('Uraian')" class="mt-0 mb-1" />
                        <x-select name="uraian[]" id="uraian[]" class="select-uraian">
                            @foreach ($detail as $c)
                                <option value="{{ $c->id }}" data-price="{{ $c->harga }}">
                                    {{ $c->uraian }}</option>
                            @endforeach
                            {{-- <option value="Manage" data-price="{{ $c->harga }}">{{ $c->uraian }}</option> --}}
                        </x-select>
                        <x-invalid error="role" />
                    </div>
                    <div class="col-md-2 mb-0 child-row">
                        <label class="form-label mb-1">Jumlah</label>
                        <input type="number" name="qty[]" class="form-control shadow-sm" value="1">
                    </div>
                    <div class="col-md-3 child-row" style="margin-top:22px;">
                        <span class="btn btn-danger pull-right btn-del-select">Hapus</span>
                    </div>
                </div>
                <div class="d-flex justify-content-end align-items-center mt-3">
                    <span class="btn btn-dark add-select me-2">Tambahkan Uraian</span>
                    <button type="submit" class="btn btn-success float-end">Submit</button>
                </div>
            </form>
        </div>
    </div>
    @push('js')
        <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
        <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
        <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
        <script src="{{ asset('assets/js/jquery.mask.min.js') }}"></script>
        <script></script>
        <script>
            $(document).ready(function() {
                $('#dates').daterangepicker();
                $('.subtotal').mask("#.##0", {
                    reverse: true
                });
            });
        </script>
        <script>
            $('.btn-del-select').hide();
            $(document).on('click', '.add-select', function() {
                $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass(
                    "clone-row");
                $('.btn-del-select').fadeIn();
                $(this).parent().parent().find(".btn-del-select").click(function(e) {
                    $(this).parent().parent().remove();
                });
                $('.subtotal').mask("#.##0", {
                    reverse: true
                });
                // var count = $(".clone-row").find(".child-row").length;
                // console.log("Total Div Elements: " + count);
            });
        </script>
    @endpush
</x-app-layout>
