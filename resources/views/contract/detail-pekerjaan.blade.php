<x-app-layout title="Detail Kontrak Pekerjaan">
    <div class="card invoice-preview-card mb-3">
        <div class="d-flex justify-content-between align-items-center p-4 d-print-none">
            <h5>
                {{ __('Detail Kontrak Pekerjaan') }}
            </h5>

            <div class="d-flex justify-content-end">
                @if ($contract->status == 'accept')
                    <form action="{{ route('contract.delete', $contract->id) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger text-white me-2">
                            <i class="bx bxs-pencil me-2"></i>Hapus Data
                        </button>
                    </form>
                    <a href="{{ route('print.contract', $contract->id) }}" class="btn btn-outline-dark me-2">
                        <i class="bx bxs-printer me-2"></i>Cetak
                    </a>
                    {{-- <a href="{{ route('contract.addendum', $contract->id) }}" class="btn btn-outline-primary me-2">
                        <i class="bx bxs-pencil me-2"></i>Addendum Kontrak
                    </a> --}}
                @endif
                @if ($contract->status == 'pending')
                    <a href="{{ route('contract.edit', $contract->id) }}" class="btn btn-primary text-white me-2">
                        <i class="bx bxs-pencil me-2"></i>Ubah Data
                    </a>
                    <form action="{{ route('contract.confirm') }}" method="get" class="mt-0 pt-0">
                        @csrf
                        <input type="hidden" name="id_contract" value="{{ $contract->id }}">

                        <button type="submit" name="btn" value="Y" class="btn btn-success ms-2"><i
                                class="bx bxs-pencil me-2"></i>Setujui</button>
                        <button type="submit" name="btn" value="N" class="btn btn-danger ms-2"><i
                                class="bx bxs-pencil me-2"></i>Tolak</button>
                    </form>
                @endif

            </div>
        </div>
        <div class="px-4">
            <h5 class="mb-1 fw-bolder">ONBOARDING KONTRAK PEKERJAAN OUTSOURCING</h5>
            <h5 class="fw-bolder">PT ASTA NADI KARYA UTAMA</h5>
        </div>
        <div class="row p-2">
            <div class="col-12 col-lg-7 border-end">
                <div class="table-responsive">
                    <table class="table table-sm border-top m-0">
                        <tbody>
                            <tr>
                                <td width="33%" class="text-nowrap">Nama Klien</td>
                                <td width="2%">:</td>
                                <td class="text-nowrap fw-bolder">{{ $contract->project->nama }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Tanggal Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ tanggalIndo($contract->tgl_kontrak) }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nomor Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ $contract->no_kontrak_klien }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nomor Kontrak Internal</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ $contract->no_kontrak_asta }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Jumlah SDM</td>
                                <td>:</td>
                                <td class="text-nowrap">{{ $contract->jumlah_sdm }} TKO</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Tipe Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap text-uppercase">{{ $contract->tipe }}</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Jangka Waktu Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap fw-bolder">{{ $contract->lama_kontrak }} bulan</td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nominal Kontrak</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">{{ rupiah($contract->nominal_kontrak) }}</h6>
                                    <p class="mb-0 text-muted"><em>{{ terbilang($contract->nominal_kontrak) }}</em></p>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Nilai Tagihan Per Bulan</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">
                                        {{ rupiah($contract->nominal_kontrak / $contract->lama_kontrak) }}
                                    </h6>
                                    <p class="mb-0 text-muted">
                                        <em>{{ terbilang($contract->nominal_kontrak / $contract->lama_kontrak) }}</em>
                                    </p>

                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Tanggal Penagihan</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">
                                        @if ($contract->tgl_penagihan == 't')
                                            Akhir Bulan
                                        @else
                                            Tanggal {{ $contract->tgl_penagihan }} Tiap Bulannya
                                        @endif
                                    </h6>
                                </td>
                            </tr>
                            <tr>
                                <td class="text-nowrap">Termin Pembayaran</td>
                                <td>:</td>
                                <td class="text-nowrap">
                                    <h6 class="mb-0 fw-bolder">{{ $contract->term_of_payment }} hari</h6>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                <h6 class="mb-3">Detail Komponen Pekerjaan</h6>
                <div class="table-responsive">
                    <table class="table table-sm border-top m-0">
                        <thead class="table-secondary">
                            <tr>
                                <th class="text-center">No</th>
                                <th class="text-center">Item Pekerjaan</th>
                                <th class="text-center">Harga Pekerjaan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($comp as $item)
                                <tr>
                                    <td class="text-nowrap">{{ $loop->iteration }}</td>
                                    <td width="28%" class="text-nowrap">{{ $item->uraian }}</td>
                                    <td class="text-nowrap text-end">{{ rupiah($item->harga) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="card invoice-preview-card">
        <h5 class="px-4 pt-4 pb-1">
            {{ __('Riwayat Perubahan Data Kontrak') }}
        </h5>
        <table class="table table-sm table-striped">
            <thead class="table-dark">
                <tr>
                    <th class="text-white">No. Kontrak</th>
                    <th class="text-white">Tanggal</th>
                    <th class="text-white">Jumlah SDM</th>
                    <th class="text-white">Nominal</th>
                    <th class="text-white">Tagihan per Bulan</th>
                    <th class="text-white">Tipe</th>
                    <th class="text-white">Opsi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detail as $key => $item)
                    <tr>
                        <td class="text-nowrap">{{ $item->no_kontrak_asta }}</td>
                        <td class="text-nowrap">{{ tanggalIndo($item->tgl_addendum) }}</td>
                        <td class="text-nowrap">{{ $item->jumlah_sdm }} TKO</td>
                        <td class="text-nowrap">{{ rupiah($item->nominal_kontrak) }}</td>
                        <td class="text-nowrap">{{ rupiah($item->inv_per_bulan) }}</td>
                        <td class="text-nowrap">{{ $item->add_tipe == 'initial' ? 'awal' : 'addendum' }}</td>
                        <td class="text-nowrap">
                            <button type="button" class="btn btn-dark btn-sm" data-bs-toggle="modal"
                                data-bs-target="#modal{{ $key }}">
                                Detail Kontrak
                            </button>
                            <div class="modal fade" id="modal{{ $key }}" tabindex="-1"
                                aria-labelledby="modalScrollableTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="modalScrollableTitle">Detail Kontrak</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="table-responsive">
                                                <table
                                                    class="table table-sm table-striped table-borderless table-condensed m-0">
                                                    <tbody>
                                                        <tr>
                                                            <td class="text-wrap">Tanggal Kontrak</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">
                                                                {{ tanggalIndo($item->tgl_kontrak) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Nomor Kontrak</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ $item->no_kontrak_klien }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Nomor Kontrak Internal</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ $item->no_kontrak_asta }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Jumlah SDM</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ $item->jumlah_sdm }} TKO
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Tipe Kontrak</td>
                                                            <td>:</td>
                                                            <td class="text-nowrap text-uppercase">
                                                                {{ $item->tipe }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Jangka Waktu Kontrak</td>
                                                            <td>:</td>
                                                            <td class="text-nowrap fw-bolder">
                                                                {{ $item->lama_kontrak }} bulan</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Nominal Kontrak</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">
                                                                <h6 class="mb-0 fw-bolder">
                                                                    {{ rupiah($item->nominal_kontrak) }}</h6>
                                                                <p class="mb-0 text-muted">
                                                                    <em>{{ terbilang($item->nominal_kontrak) }}</em>
                                                                </p>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Nilai Tagihan Per Bulan</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">
                                                                <h6 class="mb-0 fw-bolder">
                                                                    {{ rupiah($item->nominal_kontrak / $item->lama_kontrak) }}
                                                                </h6>
                                                                <p class="mb-0 text-muted">
                                                                    <em>{{ terbilang($item->nominal_kontrak / $item->lama_kontrak) }}</em>
                                                                </p>

                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Tanggal Penagihan</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">
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
                                                            <td class="text-wrap">Termin Pembayaran</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">
                                                                <h6 class="mb-0 fw-bolder">
                                                                    {{ $item->term_of_payment }} hari</h6>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td width="28%" class="text-wrap">Biaya Gaji</td>
                                                            <td width="2%">:</td>
                                                            <td class="text-wrap">{{ rupiah($item->salary) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">Fee Management</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">
                                                                {{ rupiah($item->fee_management) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">BPJS Kesehatan</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ rupiah($item->bpjs_kes) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">BPJS Tenaga Kerja</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ rupiah($item->bpjs_tk) }}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">PPN</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ rupiah($item->ppn) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td class="text-wrap">PPH</td>
                                                            <td>:</td>
                                                            <td class="text-wrap">{{ rupiah($item->pph) }}</td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Tutup</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>
