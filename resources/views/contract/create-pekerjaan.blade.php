<x-app-layout title="Tambah Kontrak Pekerjaan Baru">
    <div class="card mb-3">
        <div class="card-body">
            <div class="mb-4">
                <a href="{{ route('contract.index-pekerjaan') }}" class="btn btn-dark">
                    <i class="bx bx-arrow-back bx-xs"></i>
                    {{ __('Kembali') }}
                </a>
            </div>
            <h5 class="card-title ms-3">
                {{ __('Tambah Kontrak Pekerjaan Baru') }}
            </h5>


            <form class="" action="{{ route('contract.store-pekerjaan') }}" method="post">
                @csrf
                @method('POST')
                <input type="hidden" name="id_contract" value="{{ $data->id }}" />
                <div class="row mt-1 mb-3 pb-3 mx-2 border-bottom">
                    <div class="col-12 col-lg-6">
                        <div class="mb-3 row">
                            <x-label for="id_project" :value="__('Nama Klien')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <x-select name="id_project" id="id_project" autofocus>
                                    @foreach ($client as $c)
                                        <option value="{{ $c->id }}"
                                            {{ selectedOption($c->id, $data->id_project) }}>
                                            {{ $c->nama }}</option>
                                    @endforeach
                                </x-select>
                                <x-invalid error="id_project" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <x-label for="nama_pekerjaan" :value="__('Keterangan')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <x-input type="text" name="nama_pekerjaan" id="nama_pekerjaan" :placeholder="__('Keterangan')"
                                    :value="old('nama_pekerjaan', $data->nama_pekerjaan)" autofocus />
                                <x-invalid error="nama_pekerjaan" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <x-label for="no_kontrak_klien" :value="__('No. Kontrak')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <x-input type="text" name="no_kontrak_klien" id="no_kontrak_klien" :placeholder="__('No. Kontrak')"
                                    :value="old('no_kontrak_klien', $data->no_kontrak_klien)" autofocus />
                                <x-invalid error="no_kontrak_klien" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-6">
                        <div class="mb-3 row">
                            <x-label for="tgl_kontrak" :value="__('Tgl. Awal Kontrak')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <x-input type="date" name="tgl_kontrak" id="tgl_kontrak" :placeholder="__('Tgl. Awal Kontrak')"
                                    :value="old('tgl_kontrak', $data->tgl_kontrak)" autofocus />
                                <x-invalid error="tgl_kontrak" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <x-label for="tgl_cutoff" :value="__('Tgl. Cut Off')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <x-select name="tgl_cutoff" id="tgl_cutoff" autofocus>
                                    <option value="01" {{ selectedOption('01', $data->tgl_cutoff) }}>01</option>
                                    <option value="02" {{ selectedOption('02', $data->tgl_cutoff) }}>02</option>
                                    <option value="03" {{ selectedOption('03', $data->tgl_cutoff) }}>03</option>
                                    <option value="04" {{ selectedOption('04', $data->tgl_cutoff) }}>04</option>
                                    <option value="05" {{ selectedOption('05', $data->tgl_cutoff) }}>05</option>
                                    <option value="06" {{ selectedOption('06', $data->tgl_cutoff) }}>06</option>
                                    <option value="07" {{ selectedOption('07', $data->tgl_cutoff) }}>07</option>
                                    <option value="08" {{ selectedOption('08', $data->tgl_cutoff) }}>08</option>
                                    <option value="09" {{ selectedOption('09', $data->tgl_cutoff) }}>09</option>
                                    <option value="10" {{ selectedOption('10', $data->tgl_cutoff) }}>10</option>
                                    <option value="11" {{ selectedOption('11', $data->tgl_cutoff) }}>11</option>
                                    <option value="12" {{ selectedOption('12', $data->tgl_cutoff) }}>12</option>
                                    <option value="13" {{ selectedOption('13', $data->tgl_cutoff) }}>13</option>
                                    <option value="14" {{ selectedOption('14', $data->tgl_cutoff) }}>14</option>
                                    <option value="15" {{ selectedOption('15', $data->tgl_cutoff) }}>15</option>
                                    <option value="16" {{ selectedOption('16', $data->tgl_cutoff) }}>16</option>
                                    <option value="17" {{ selectedOption('17', $data->tgl_cutoff) }}>17</option>
                                    <option value="18" {{ selectedOption('18', $data->tgl_cutoff) }}>18</option>
                                    <option value="19" {{ selectedOption('19', $data->tgl_cutoff) }}>19</option>
                                    <option value="20" {{ selectedOption('20', $data->tgl_cutoff) }}>20</option>
                                    <option value="21" {{ selectedOption('21', $data->tgl_cutoff) }}>21</option>
                                    <option value="22" {{ selectedOption('22', $data->tgl_cutoff) }}>22</option>
                                    <option value="23" {{ selectedOption('23', $data->tgl_cutoff) }}>23</option>
                                    <option value="24" {{ selectedOption('24', $data->tgl_cutoff) }}>24</option>
                                    <option value="25" {{ selectedOption('25', $data->tgl_cutoff) }}>25</option>
                                    <option value="26" {{ selectedOption('26', $data->tgl_cutoff) }}>26</option>
                                    <option value="27" {{ selectedOption('27', $data->tgl_cutoff) }}>27</option>
                                    <option value="28" {{ selectedOption('28', $data->tgl_cutoff) }}>28</option>
                                    <option value="t" {{ selectedOption('t', $data->tgl_cutoff) }}>Akhir Bulan
                                    </option>
                                </x-select>
                                <x-invalid error="tgl_cutoff" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <x-label for="lama_kontrak" :value="__('Lama Kontrak')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <div class="input-group">
                                    <input type="number" class="form-control shadow-sm"
                                        placeholder="Lama Kontrak dalam satuan bulan" aria-label="Lama Kontrak"
                                        name="lama_kontrak" value="{{ old('lama_kontrak', $data->lama_kontrak) }}">
                                    <span class="input-group-text shadow-sm">bulan</span>
                                </div>
                                <x-invalid error="lama_kontrak" />
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <x-label for="term_of_payment" :value="__('Termin Pembayaran')" class="col-md-3 col-form-label" />
                            <div class="col-md-9">
                                <x-input type="number" name="term_of_payment" id="term_of_payment"
                                    :placeholder="__('Termin Pembayaran')" :value="old('term_of_payment', $data->term_of_payment)" autofocus />
                                <x-invalid error="term_of_payment" />
                            </div>
                        </div>
                    </div>
                </div>
                <h5 class="card-title ms-3">
                    {{ __('Detail Komponen Pekerjaan') }}
                </h5>
                <div class="row clone-row mt-1 mb-1 mx-2">

                    <div class="col-md-7 mb-0">
                        <label class="form-label mb-1">Uraian Pekerjaan</label>
                        <input type="text" name="uraian[]" class="form-control">
                    </div>
                    <div class="col-md-3 mb-0">
                        <label class="form-label mb-1">Harga Pekerjaan</label>

                        <div class="input-group">
                            <span class="input-group-text shadow-sm">Rp</span>
                            <input type="number" class="form-control shadow-sm" placeholder="Harga Pekerjaan"
                                aria-label="Harga Pekerjaan" name="harga[]">
                        </div>
                        <x-invalid error="harga[]" />
                    </div>
                    <div class="col-md-2" style="margin-top:22px;">
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
        <script>
            $('.btn-del-select').hide();
            $(document).on('click', '.add-select', function() {
                $(this).parent().parent().find(".clone-row").clone().insertBefore($(this).parent()).removeClass(
                    "clone-row");
                $('.btn-del-select').fadeIn();
                $(this).parent().parent().find(".btn-del-select").click(function(e) {
                    $(this).parent().parent().remove();
                });
                alert($('.clone-row').size());
            });
        </script>
    @endpush
</x-app-layout>
