@php
    $nominal        = $data->biaya_satuan;
    $fee_manage     = $data->fee_manage;
    $ppn            = $data->ppn;
    $pph            = $data->pph;
    $total          = $nominal + $fee_manage + $ppn + $pph;
    $no = 1;
@endphp

<x-app-layout title="Detail Invoice">
    <form class="card invoice-preview-card" action="{{ route('invoice.update', $data->id) }}" method="post">
        <div class="d-flex justify-content-between align-items-center p-4 d-print-none">
            <h5>
                {{ __('Detail Invoice') }}
            </h5>

            <div class="float-end">
                <div class="d-flex justify-content-between align-items-baseline">
                    <a href="{{ route('print.surat', $data->id) }}" class="btn btn-outline-dark me-2">
                        <i class="bx bxs-download me-2"></i>SPPI
                    </a>
                    <a href="{{ route('print.receipt', $data->id) }}" class="btn btn-outline-dark me-2">
                        <i class="bx bxs-download me-2"></i>OR
                    </a>
                    <a href="{{ route('print.invoice', $data->id) }}" class="btn btn-outline-dark me-2">
                        <i class="bx bxs-download me-2"></i>INV
                    </a>
                </div>
            </div>
        </div>
        <hr class="my-0 d-print-none">
        <div class="card-body py-1">
            <div
                class="d-flex justify-content-between align-items-end flex-xl-row flex-md-column flex-sm-row flex-column p-sm-3 p-0">
                <div class="mb-xl-0 mb-4 me-4">
                    <h2 class="mb-3 fw-bolder text-uppercase">INVOICE</h2>
                    <h6 class="mb-1 text-uppercase">Kepada Yth.</h6>
                    <p class="mb-0 text-uppercase"><b>{{ $data->contract->project->nama }}</b></p>
                    <p class="mb-0 text-uppercase">{{ $data->contract->project->alamat }}</p>
                    <p class="mb-0 text-uppercase">{{ $data->contract->project->alamat2 }}</p>
                </div>
                <div class="mb-xl-0 mb-4 px-4">
                    @csrf
                    @method("PUT")
                    <table class="table table-borderless table-sm mb-3">
                        <tbody>
                            <tr>
                                <th class="text-start">No. Kontrak</th>
                                <td class="text-start">{{ $data->contract->no_kontrak_asta }}</td>
                            </tr>
                            <tr>
                                <th class="text-start">Tanggal Invoice</th>
                                <td class="text-start">
                                    <input type="date" name="tgl_invoice" id="tgl_invoice" class="form-control shadow-sm" value="{{ date_format($data->tgl_terbit_inv ?? now(), 'Y-m-d') }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">No. Surat</th>
                                <td class="text-start">
                                    <input type="text" name="no_surat" id="no_surat" class="form-control shadow-sm" value="{{ $data->no_surat ?? '-' }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">No. Invoice</th>
                                <td class="text-start">
                                    <input type="text" name="no_inv" id="no_inv" class="form-control shadow-sm" value="{{ $data->no_inv ?? '-' }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">No. Receipt</th>
                                <td class="text-start">
                                    <input type="text" name="no_or" id="no_or" class="form-control shadow-sm" value="{{ $data->no_or ?? '-' }}">
                                </td>
                            </tr>
                            <tr>
                                <th class="text-start">Tampil Hanya Nilai Total</th>
                                <td class="text-start">
                                    <input class="form-check-input" type="checkbox" value="1" id="customCheckPrimary" name="tampil_total_only" {{ $data->no_surat ? 'checked' : '' }}"/>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-start" colspan='2'>
                                    <button class="btn btn-sm w-100 btn-primary">Perbarui Data</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div>
            <table class="table table-bordered table-sm">
                <thead class="table-secondary">
                    <tr>
                        <td width="5%" class="text-nowrap text-center fw-bolder">No</td>
                        <td class="text-nowrap fw-bolder">Uraian</td>
                        <td width="25%" class="text-nowrap text-center fw-bolder">Total</td>
                    </tr>
                </thead>
                <tbody>
                    @if ($dataRender)
                        {{-- @foreach ($dataRender->details as $item)
                            <tr>
                                <td width="5%" class="text-nowrap text-center">{{ $loop->iteration }}</td>
                                <td class="text-nowrap">{{ $item->uraian }}</td>
                                <td class="text-nowrap text-end">{{ rupiah($item->subtotal) }}</td>
                            </tr>
                        @endforeach --}}
                        
                    @else
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ $no }}</td>
                            <!--<td class="text-nowrap">{{ buatNamaUraian($data->contract->id) }}</td>-->
                            <td class="text-nowrap">
                                <input type="text" name="uraian" id="uraian" class="form-control shadow-sm" value="{{ $data->uraian ?? buatNamaUraian($data->contract->id) }}">
                            </td>
                            <td class="text-nowrap text-end">{{ rupiah($data->biaya_satuan) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ ++$no }}</td>
                            <td class="text-nowrap">Management Fee</td>
                            <td class="text-nowrap text-end">{{ rupiah($data->fee_manage) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ ++$no }}</td>
                            <td class="text-nowrap">PPN 11%</td>
                            <td class="text-nowrap text-end">{{ rupiah($ppn) }}</td>
                        </tr>
                        <tr>
                            <td width="5%" class="text-nowrap text-center">{{ ++$no }}</td>
                            <td class="text-nowrap">PPH 2%</td>
                            <td class="text-nowrap text-end">{{ rupiah($pph) }}</td>
                        </tr>
                        <tr>
                            <td colspan="2" class="text-nowrap ps-3">
                                <p class="mb-0">Terbilang</p>
                                <p class="fw-bold"><em>{{ terbilang($data->nominal) }}</em></p>
                                <img src="{{ asset('assets/img/'.$data->contract->project->idvendor->url_img) }}" width="20%" class="mb-2" />
                            </td>
                            <td class="text-nowrap text-end fw-bolder h3">{{ rupiah($data->nominal) }}</td>
                        </tr>
                    @endif
                </tbody>
            </table>
            <!--<span class="ms-3">NB. Mohon untuk menambahkan keterangan periode pembayaran/no. invoice yang dibayar-->
            <!--    saat proses transfer</span>-->
        </div>
    </form>
</x-app-layout>
