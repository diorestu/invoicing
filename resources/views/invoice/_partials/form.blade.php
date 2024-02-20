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
                    <x-select name="id_project" id="id_project" autofocus>
                        @foreach ($client as $c)
                            <option value="{{ $c->id }}" {{ selectedOption($c->id, $data->id_project) }}>
                                {{ $c->nama }}</option>
                        @endforeach
                    </x-select>
                    <x-invalid error="id_project" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="keterangan" :value="__('Keterangan')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-input type="text" name="keterangan" id="keterangan" :placeholder="__('Keterangan')" :value="old('keterangan', $data->keterangan)"
                        autofocus />
                    <x-invalid error="keterangan" />
                </div>
            </div>
            <div class="mb-3 row">
                <x-label for="no_kontrak" :value="__('No. Kontrak')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-input type="text" name="no_kontrak" id="no_kontrak" :placeholder="__('No. Kontrak')" :value="old('no_kontrak', $data->no_kontrak)"
                        autofocus />
                    <x-invalid error="no_kontrak" />
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
                        <option value="pekerjaan" {{ selectedOption($c->id, $data->id_project) }}>
                            Pekerjaan</option>
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
                <x-label for="tgl_penagihan" :value="__('Tgl. Penagihan')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-select name="tgl_penagihan" id="tgl_penagihan" autofocus>
                        <option value="01" {{ selectedOption('01', $data->tgl_penagihan) }}>01</option>
                        <option value="02" {{ selectedOption('02', $data->tgl_penagihan) }}>02</option>
                        <option value="03" {{ selectedOption('03', $data->tgl_penagihan) }}>03</option>
                        <option value="04" {{ selectedOption('04', $data->tgl_penagihan) }}>04</option>
                        <option value="05" {{ selectedOption('05', $data->tgl_penagihan) }}>05</option>
                        <option value="06" {{ selectedOption('06', $data->tgl_penagihan) }}>06</option>
                        <option value="07" {{ selectedOption('07', $data->tgl_penagihan) }}>07</option>
                        <option value="08" {{ selectedOption('08', $data->tgl_penagihan) }}>08</option>
                        <option value="09" {{ selectedOption('09', $data->tgl_penagihan) }}>09</option>
                        <option value="10" {{ selectedOption('10', $data->tgl_penagihan) }}>10</option>
                        <option value="20" {{ selectedOption('20', $data->tgl_penagihan) }}>20</option>
                        <option value="21" {{ selectedOption('21', $data->tgl_penagihan) }}>21</option>
                        <option value="22" {{ selectedOption('22', $data->tgl_penagihan) }}>22</option>
                        <option value="23" {{ selectedOption('23', $data->tgl_penagihan) }}>23</option>
                        <option value="24" {{ selectedOption('24', $data->tgl_penagihan) }}>24</option>
                        <option value="25" {{ selectedOption('25', $data->tgl_penagihan) }}>25</option>
                        <option value="26" {{ selectedOption('26', $data->tgl_penagihan) }}>26</option>
                        <option value="27" {{ selectedOption('27', $data->tgl_penagihan) }}>27</option>
                        <option value="28" {{ selectedOption('28', $data->tgl_penagihan) }}>28</option>
                        <option value="t" {{ selectedOption('t', $data->tgl_penagihan) }}>Akhir Bulan</option>
                    </x-select>
                    <x-invalid error="tgl_penagihan" />
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
                <x-label for="fee_manage" :value="__('Fee Management')" class="col-md-3 col-form-label" />
                <div class="col-md-9">
                    <x-input type="number" name="fee_manage" id="fee_manage" :placeholder="__('Fee Management (%)')" :value="old('fee_manage', $data->fee_manage)"
                        autofocus />
                    <x-invalid error="fee_manage" />
                </div>
            </div>

        </div>
    </div>

    {{-- @if ($data->id)
        <div class="mb-3">
            <x-label for="password" :value="__('Password')" />
            <x-input type="password" name="password" id="password" :placeholder="__('Password')" />
            <x-invalid error="password">
                <small>{{ __('Empty if not change.') }}</small>
            </x-invalid>
        </div>

        <div class="mb-3">
            <x-label for="password_confirmation" :value="__('Password confirmation')" />
            <x-input type="password" name="password_confirmation" id="password_confirmation" :placeholder="__('Password confirmation')" />
            <x-invalid error="password_confirmation">
                <small>{{ __('Empty if not change.') }}</small>
            </x-invalid>
        </div>
    @else
        <div class="mb-3">
            <x-label for="password" :value="__('Password')" />
            <x-input type="password" name="password" id="password" :placeholder="__('Password')" />
            <x-invalid error="password" />
        </div>

        <div class="mb-3">
            <x-label for="password_confirmation" :value="__('Password confirmation')" />
            <x-input type="password" name="password_confirmation" id="password_confirmation" :placeholder="__('Password confirmation')" />
            <x-invalid error="password_confirmation" />
        </div>
    @endif --}}

    <div class="text-end">
        <x-button type="submit" class="btn btn-primary" :value="$data->id ? __('Simpan Perubahan Data') : __('Tambah Kontrak')" />
    </div>


</form>
