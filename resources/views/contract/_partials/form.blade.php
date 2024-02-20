<form action="{{ $data->id ? route('contract.update', $data->id) : route('contract.store') }}" method="POST">
    @csrf
    @if ($data->id)
        @method('PUT')
    @endif

    <div class="row">
        <div class="col-12 col-lg-6">
            <div class="mb-3 row">
                <x-label for="id_project" :value="__('Nama Klien')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-select name="id_project" id="id_project" autofocus class="shadow-sm">
                        @foreach ($client as $c)
                            <option value="{{ $c->id }}" {{ selectedOption($c->id, $data->id_project) }}>
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
            <div class="mb-3 row">
                <x-label for="tgl_kontrak" :value="__('Tgl. Kontrak')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-input type="date" name="tgl_kontrak" id="tgl_kontrak" :placeholder="__('Tgl. Kontrak')" :value="old('tgl_kontrak', $data->tgl_kontrak)"
                        autofocus />
                    <x-invalid error="tgl_kontrak" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="tipe" :value="__('Tipe Kontrak')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-select name="tipe" id="tipe" autofocus>
                        <option value="sdm" {{ selectedOption($c->id, $data->id_project) }}>
                            SDM</option>
                        <option value="event" {{ selectedOption($c->id, $data->id_project) }}>
                            Event</option>
                    </x-select>
                    <x-invalid error="tipe" />
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-6">
            <div class="mb-3 row">
                <x-label for="jumlah_sdm" :value="__('Jumlah SDM')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="number" class="form-control shadow-sm" placeholder="Jumlah SDM"
                            aria-label="Lama Kontrak" name="jumlah_sdm"
                            value="{{ old('jumlah_sdm', $data->jumlah_sdm) }}">
                        <span class="input-group-text shadow-sm">orang</span>
                    </div>
                    <x-invalid error="jumlah_sdm" />
                </div>
            </div>

            <div class="mb-3 row">
                <x-label for="lama_kontrak" :value="__('Lama Kontrak')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <input type="number" class="form-control shadow-sm"
                            placeholder="Lama Kontrak dalam satuan bulan" aria-label="Lama Kontrak" name="lama_kontrak"
                            value="{{ old('lama_kontrak', $data->lama_kontrak) }}">
                        <span class="input-group-text shadow-sm">bulan</span>
                    </div>
                    <x-invalid error="lama_kontrak" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="nominal_kontrak" :value="__('Nominal Kontrak')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-input type="number" name="nominal_kontrak" id="nominal_kontrak" :placeholder="__('Nominal Kontrak')"
                        :value="old('nominal_kontrak', $data->nominal_kontrak)" autofocus />
                    <x-invalid error="nominal_kontrak" />
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
                        <option value="t" {{ selectedOption('t', $data->tgl_cutoff) }}>Akhir Bulan</option>
                    </x-select>
                    <x-invalid error="tgl_cutoff" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="term_of_payment" :value="__('Termin Pembayaran')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-input type="number" name="term_of_payment" id="term_of_payment" :placeholder="__('Termin Pembayaran')"
                        :value="old('term_of_payment', $data->term_of_payment)" autofocus />
                    <x-invalid error="term_of_payment" />
                </div>
            </div>
        </div>
        <div class="col-12">
            <hr>
            <div class="card-title">
                Rincian Tagihan Per Bulan
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3 row">
                <x-label for="salary" :value="__('Jumlah Gaji')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="Jumlah Gaji"
                            aria-label="Jumlah Gaji" name="salary" value="{{ old('salary', $data->salary) }}">
                    </div>
                    <x-invalid error="salary" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="fee_management" :value="__('Fee Management')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="Fee Management"
                            aria-label="Lama Kontrak" name="fee_management"
                            value="{{ old('fee_management', $data->fee_management) }}">
                    </div>
                    <x-invalid error="fee_management" />
                </div>
            </div>
            {{-- <div class="mb-3 row">
                <x-label for="fee_management" :value="__('Fee Management')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="Fee Management"
                            aria-label="Lama Kontrak" name="fee_management"
                            value="{{ old('fee_management', $data->fee_management) }}">
                    </div>
                    <x-invalid error="fee_management" />
                </div>
            </div> --}}
            {{-- <div class="mb-3 row">
                <x-label for="bpjs_kes" :value="__('BPJS Kesehatan')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="BPJS Kesehatan"
                            aria-label="Lama Kontrak" name="bpjs_kes"
                            value="{{ old('bpjs_kes', $data->bpjs_kes) }}">
                    </div>
                    <x-invalid error="bpjs_kes" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="bpjs_tk" :value="__('BPJS Tenaga Kerja')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="BPJS Tenaga Kerja"
                            aria-label="Lama Kontrak" name="bpjs_tk" value="{{ old('bpjs_tk', $data->bpjs_tk) }}">
                    </div>
                    <x-invalid error="bpjs_tk" />
                </div>
            </div> --}}
            <div class="mb-3 row">
                <x-label for="ppn" :value="__('PPN')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="PPN" aria-label="PPN"
                            name="ppn" value="{{ old('ppn', $data->ppn) }}">
                    </div>
                    <x-invalid error="ppn" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="pph" :value="__('PPH')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <div class="input-group">
                        <span class="input-group-text shadow-sm">Rp</span>
                        <input type="number" class="form-control shadow-sm" placeholder="PPH" aria-label="PPH"
                            name="pph" value="{{ old('pph', $data->pph) }}">
                    </div>
                    <x-invalid error="pph" />
                </div>
            </div>
        </div>
    </div>

    @if ($data->id)
    @endif

    <div class="text-end">
        <x-button type="submit" class="btn btn-primary me-3" :value="$data->id ? __('Simpan Perubahan Data') : __('Simpan Kontrak')" />
        {{-- <a href="{{  }}"></a> --}}
    </div>


</form>
