@php
    if ($dataRender) {
        # code...
        $no = count($dataRender->details);
        $ppn = $dataRender->grand_total * 0.11;
        $pph = $dataRender->grand_total * 0.02;
        $total = $dataRender->grand_total + $ppn + $pph;
    } else {
        $no = 1;
        $ppn = $data->nominal_kontrak * 0.11;
        $pph = $data->nominal_kontrak * 0.02;
        $total = $data->nominal_kontrak + $ppn + $pph;
    }
@endphp
<x-app-layout title="Detail Invoice">
    <div class="card invoice-preview-card">
        <div class="d-flex justify-content-between align-items-center p-4 d-print-none">
            <h5>
                {{ __('Detail Invoice') }}
            </h5>

            <div class="float-end">
                <div class="d-flex justify-content-between align-items-baseline">
                    <a href="{{ route('print.invoice', $data->id) }}" class="btn btn-dark text-white me-2">
                        <i class="bx bxs-printer me-2"></i>Cetak
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-0 d-print-none">
        <div class="card-body mb-0 py-0">
            <div
                class="d-flex justify-content-between align-items-center flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                <div class="">
                    <img src="{{ asset('assets/logo-asta.png') }}" alt="Logo" class="mb-0">
                </div>
                <div class="mb-xl-0 mb-2 text-end">
                    <table class="table table-bordered table-sm mb-3">
                        <tbody>
                            <tr>
                                <td class="text-start">Doc. No.</td>
                                <td class="text-start">ASTA-SPT-KEU-P01-F03</td>
                            </tr>
                            <tr>
                                <td class="text-start">Revisi</td>
                                <td class="text-start">00</td>
                            </tr>
                            <tr>
                                <td class="text-start">Tgl. Terbit</td>
                                {{-- <td class="text-start">{{ tglIndo2($dataRender->tgl_terbit_inv) }}</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="card-body py-1">
            <div
                class="d-flex justify-content-between align-items-end flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                <div class="mb-xl-0 mb-4 me-4">
                    <h2 class="mb-3 fw-bolder text-uppercase">INVOICE</h2>
                    <h6 class="mb-1 text-uppercase">Kepada Yth.</h6>
                    <p class="mb-0 text-uppercase"><b>YAYASAN PENDIDIKAN HANDAYANI DENPASAR</b></p>
                    <p class="mb-0 text-uppercase">JALAN TUKAD BANYUSARI NO. 17B</p>
                    <p class="mb-0 text-uppercase">PANJER, DENPASAR SELATAN</p>
                    <p class="mb-0 text-uppercase">DENPASAR, BALI</p>
                </div>
                <div class="mb-xl-0 mb-4 px-4">
                    <table class="table table-borderless table-sm mb-3">
                        <tbody>
                            <tr>
                                <th class="text-start">Tanggal Invoice</th>
                                {{-- <td class="text-start">{{ tglIndo2($dataRender-) }}</td> --}}
                            </tr>
                            <tr>
                                <th class="text-start">No. Kontrak</th>
                                <td class="text-start">{{ $data->contract->no_kontrak_asta }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">No. PO</th>
                                {{-- <td class="text-start">{{ $dataRender->nomor_po }}</td> --}}
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>
            <table class="table table-bordered table-striped">
                <thead class="table-secondary">
                    <tr>
                        <td width="5%" class="text-nowrap text-center fw-bolder">No</td>
                        <td class="text-nowrap fw-bolder">Uraian</td>
                        <td width="25%" class="text-nowrap text-center fw-bolder">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataRender)
                        @foreach ($dataRender->details as $item)
                            <tr>
                                <td width="5%" class="text-nowrap text-center">{{ $loop->iteration }}</td>
                                <td class="text-nowrap">{{ $item->uraian }}</td>
                                <td class="text-nowrap text-end">{{ rupiah($item->subtotal) }}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no + 1 }}</td>
                            <td class="text-nowrap">PPN 11%</td>
                            <td class="text-nowrap text-end">{{ rupiah($ppn) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no + 2 }}</td>
                            <td class="text-nowrap">PPH 2%</td>
                            <td class="text-nowrap text-end">{{ rupiah($pph) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-nowrap">
                                <p class="mb-0">Terbilang</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('assets/Mandiri-Anaku.png') }}" width="20%" class="mb-2" />
                                    <div class="text-start ps-0 pe-5 py-5 me-5">
                                        <em>{{ terbilang($total) }}</em>
                                    </div>
                                </div>

                            </td>
                            <td class="text-nowrap text-end fw-bolder">{{ rupiah($total) }}</td>
                        </tr>
                    @else
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no + 1 }}</td>
                            <td class="text-nowrap">PPN 11%</td>
                            <td class="text-nowrap text-end">{{ rupiah($ppn) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no + 2 }}</td>
                            <td class="text-nowrap">PPH 2%</td>
                            <td class="text-nowrap text-end">{{ rupiah($pph) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-nowrap">
                                <p class="mb-0">Terbilang</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <img src="{{ asset('assets/Mandiri-Anaku.png') }}" width="20%" class="mb-2" />
                                    <div class="text-start ps-0 pe-5 py-5 me-5">
                                        <em>{{ terbilang($total) }}</em>
                                    </div>
                                </div>

                            </td>
                            <td class="text-nowrap text-end fw-bolder">{{ rupiah($total) }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <span class="ms-3">NB. Mohon untuk menambahkan keterangan periode pembayaran/no. invoice yang dibayar
                saat proses transfer</span>
        </div>

        <div class="card-body">
            <div class="px-4 pt-3 mb-5">
                <h6 class="pb-1 text-start mb-0 fw-bolder">PT Asta Nadi Karya Utama</h6>
                <h6 class="pb-2 text-start">Keuangan</h6>
                <br />
                <br />
                <br />
                <h6 class="mb-0 text-start fw-bolder">Gusti Ayu Apriliani Swantari, S.M.</h6>
            </div>
            <div class="row">
                <div class="col-12">
                    <span>Dicetak melalui Smartwork &copy; All in one solution for your HR needs</span>
                    <span class="fw-medium">pada {{ now() }}</span>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
