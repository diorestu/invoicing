<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="modalScrollableTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalScrollableTitle">Detail Kontrak</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-sm table-striped table-borderless table-condensed m-0">
                        <tbody>
                            <tr>
                                <td class="text-nowrap">Tanggal Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    {{ tanggalIndo($item->tgl_kontrak) }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nomor Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ $item->no_kontrak_klien }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nomor Kontrak Internal</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ $item->no_kontrak_asta }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Jumlah SDM</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ $item->jumlah_sdm }} TKO
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Tipe Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap text-uppercase">
                                    {{ $item->tipe }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Jangka Waktu Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap fw-bolder">
                                    {{ $item->lama_kontrak }} bulan</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nominal Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">
                                        {{ rupiah($item->nominal_kontrak) }}</h6>
                                    <p class="mb-0 text-muted">
                                        <em>{{ terbilang($item->nominal_kontrak) }}</em>
                                    </p>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nilai Tagihan Per Bulan</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">
                                        {{ rupiah($item->nominal_kontrak / $item->lama_kontrak) }}
                                    </h6>
                                    <p class="mb-0 text-muted">
                                        <em>{{ terbilang($item->nominal_kontrak / $item->lama_kontrak) }}</em>
                                    </p>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Tanggal Penagihan</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">
                                        @if ($item->tgl_penagihan == 't')
                                            Akhir Bulan
                                        @else
                                            Tanggal {{ $item->tgl_penagihan }} Tiap
                                            Bulannya
                                        @endif
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Termin Pembayaran</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">
                                        {{ $item->term_of_payment }} hari</h6>
                                </td>
                            </tr>
                            <tr>
                                <td width="28%" class="text-nowrap">Biaya Gaji</td>
                                <td width="2%">:</td>
                                <td class="text-nowrap">{{ rupiah($item->salary) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Fee Management</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    {{ rupiah($item->fee_management) }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">BPJS Kesehatan</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ rupiah($item->bpjs_kes) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">BPJS Tenaga Kerja</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ rupiah($item->bpjs_tk) }}
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">PPN</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ rupiah($item->ppn) }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">PPH</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ rupiah($item->pph) }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
