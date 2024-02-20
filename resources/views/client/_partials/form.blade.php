<form action="{{ $data->id ? route('client.update', $data->id) : route('client.store') }}" method="POST">
    @csrf
    @if ($data->id)
        @method('PUT')
    @endif

    <div class="row me-2">
        <div class="col-8 pe-1">
            <div class="mb-3 row pe-3">
                <x-label for="kategori" :value="__('Kategori Klien')" class="col-md-4 col-form-label" />
                <div class="col-md-8 ps-5 pe-0">
                    <x-select name="kategori" id="kategori" autofocus>
                        <option value="Bandara" {{ selectedOption('Bandara', $data->kategori) }}>Bandara</option>
                        <option value="Kesehatan" {{ selectedOption('Kesehatan', $data->kategori) }}>Kesehatan</option>
                        <option value="Manufaktur" {{ selectedOption('Manufaktur', $data->kategori) }}>Manufaktur
                        </option>
                        <option value="Pemerintahan" {{ selectedOption('Pemerintahan', $data->kategori) }}>Pemerintahan
                        </option>
                        <option value="Perbankan" {{ selectedOption('Perbankan', $data->kategori) }}>Perbankan</option>
                        <option value="Logistik" {{ selectedOption('Logistik', $data->kategori) }}>Logistik</option>
                        <option value="Lainnya" {{ selectedOption('Lainnya', $data->kategori) }}>Lainnya</option>
                    </x-select>
                    <x-invalid error="kategori" />
                </div>
            </div>

            <div class="mb-3 row pe-3">
                <x-label for="nama" :value="__('Nama Klien')" class="col-md-4 col-form-label" />
                <div class="col-md-8 ps-5 pe-0">
                    <x-input type="text" name="nama" id="nama" :placeholder="__('Nama Klien')" :value="old('nama', $data->nama)"
                        autofocus />
                    <x-invalid error="nama" />
                </div>
            </div>
        </div>
        <div class="col-4 ps-3 pe-1">
            <div class="mb-3 row pe-0">
                <x-label for="pic" :value="__('Nama PIC')" class="col-md-5 col-form-label" />
                <div class="col-md-7 pe-0">
                    <x-select name="pic" id="pic" autofocus>
                        <option value="Fani Septiani">Fani Septiani</option>
                        <option value="Vania Prajnani">Vania Prajnani</option>
                    </x-select>
                    <x-invalid error="pic" />
                </div>
            </div>
            <div class="mb-3 row pe-0">
                <x-label for="telp" :value="__('No. Telp Klien')" class="col-md-5 col-form-label" />
                <div class="col-md-7 pe-0">
                    <x-input type="text" name="telp" id="telp" :placeholder="__('No. Telp Klien')" :value="old('telp', $data->telp)" />
                    <x-invalid error="telp" />
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 row pe-0">
            <x-label for="deskripsi" :value="__('Deskripsi Klien')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-input type="text" name="deskripsi" id="deskripsi" :placeholder="__('Deskripsi Klien')" :value="old('nama', $data->deskripsi)"
                    autofocus />
                <x-invalid error="deskripsi" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="tembusan" :value="__('Nama Pejabat**')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-input type="text" name="tembusan" id="tembusan" :placeholder="__('Nama Pejabat')" :value="old('tembusan', $data->tembusan)" />
                <x-invalid error="tembusan" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="jabatan" :value="__('Jabatan Tertera**    ')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-input type="text" name="jabatan" id="jabatan" :placeholder="__('Jabatan Tertera')" :value="old('jabatan', $data->jabatan)" />
                <x-invalid error="jabatan" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="alamat" :value="__('Alamat ')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                {{-- <x-input type="text" name="alamat" id="alamat" :placeholder="__('Alamat Lengkap Klien')" :value="old('nama', $data->alamat)" autofocus /> --}}
                <textarea id="editor" name="alamat" rows="3" class="form-control shadow-sm">{{ old('alamat', $data->alamat) }}</textarea>
                <x-invalid error="alamat" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="alamat2" :value="__('Alamat 2')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                {{-- <x-input type="text" name="alamat" id="alamat" :placeholder="__('Alamat Lengkap Klien')" :value="old('nama', $data->alamat)" autofocus /> --}}
                <textarea id="editor" name="alamat2" rows="3" class="form-control shadow-sm">{{ old('alamat2', $data->alamat2) }}</textarea>
                <x-invalid error="alamat2" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="provinsi" :value="__('Daerah Provinsi')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-select name="provinsi" id="provinsi" autofocus>
                    <option value="Aceh" {{ selectedOption('Aceh', $data->provinsi) }}>Aceh</option>
                    <option value="Sumatera Selatan" {{ selectedOption('Sumatera Barat', $data->provinsi) }}>Sumatera
                        Barat</option>
                    <option value="Sumatera Selatan" {{ selectedOption('Sumatera Barat', $data->provinsi) }}>Sumatera
                        Barat</option>
                    <option value="Sumatera Utara" {{ selectedOption('Sumatera Utara', $data->provinsi) }}>Sumatera
                        Utara</option>
                    <option value="Sumatera Selatan" {{ selectedOption('Sumatera Selatan', $data->provinsi) }}>Sumatera
                        Selatan</option>
                    <option value="Bengkulu" {{ selectedOption('Bengkulu', $data->provinsi) }}>Bengkulu</option>
                    <option value="Riau" {{ selectedOption('Riau', $data->provinsi) }}>Riau</option>
                    <option value="Kepulauan Riau" {{ selectedOption('Kepulauan Riau', $data->provinsi) }}>Kepulauan
                        Riau</option>
                    <option value="Jambi" {{ selectedOption('Jambi', $data->provinsi) }}>Jambi</option>
                    <option value="Lampung" {{ selectedOption('Lampung', $data->provinsi) }}>Lampung</option>
                    <option value="Bangka Belitung" {{ selectedOption('Bangka Belitung', $data->provinsi) }}>Bangka
                        Belitung</option>
                    <option value="Kalimantan Barat" {{ selectedOption('Kalimantan Barat', $data->provinsi) }}>
                        Kalimantan Barat</option>
                    <option value="Kalimantan Tengah" {{ selectedOption('Kalimantan Tengah', $data->provinsi) }}>
                        Kalimantan Tengah</option>
                    <option value="Kalimantan Utara" {{ selectedOption('Kalimantan Utara', $data->provinsi) }}>
                        Kalimantan Utara</option>
                    <option value="Kalimantan Selatan" {{ selectedOption('Kalimantan Selatan', $data->provinsi) }}>
                        Kalimantan Selatan</option>
                    <option value="Kalimantan Timur" {{ selectedOption('Kalimantan Timur', $data->provinsi) }}>
                        Kalimantan Timur</option>
                    <option value="Banten" {{ selectedOption('Banten', $data->provinsi) }}>Banten</option>
                    <option value="DKI Jakarta" {{ selectedOption('DKI Jakarta', $data->provinsi) }}>DKI Jakarta
                    </option>
                    <option value="Jawa Barat" {{ selectedOption('Jawa Barat', $data->provinsi) }}>Jawa Barat</option>
                    <option value="Jawa Tengah" {{ selectedOption('Jawa Tengah', $data->provinsi) }}>Jawa Tengah
                    </option>
                    <option value="DI Yogyakarta" {{ selectedOption('DI Yogyakarta', $data->provinsi) }}>DI Yogyakarta
                    </option>
                    <option value="Jawa Timur" {{ selectedOption('Jawa Timur', $data->provinsi) }}>Jawa Timur</option>
                    <option value="Bali" {{ selectedOption('Bali', $data->provinsi) }}>Bali</option>
                    <option value="Nusa Tenggara Barat" {{ selectedOption('Nusa Tenggara Barat', $data->provinsi) }}>
                        Nusa Tenggara Barat</option>
                    <option value="Nusa Tenggara Timur" {{ selectedOption('Nusa Tenggara Timur', $data->provinsi) }}>
                        Nusa Tenggara Timur</option>
                    <option value="Gorontalo" {{ selectedOption('Gorontalo', $data->provinsi) }}>Gorontalo</option>
                    <option value="Sulawesi Barat" {{ selectedOption('Sulawesi Barat', $data->provinsi) }}>Sulawesi
                        Barat</option>
                    <option value="Sulawesi Tengah" {{ selectedOption('Sulawesi Tengah', $data->provinsi) }}>Sulawesi
                        Tengah</option>
                    <option value="Sulawesi Selatan" {{ selectedOption('Sulawesi Selatan', $data->provinsi) }}>
                        Sulawesi Selatan</option>
                    <option value="Sulawesi Utara" {{ selectedOption('Sulawesi Utara', $data->provinsi) }}>Sulawesi
                        Utara</option>
                    <option value="Sulawesi Tenggara" {{ selectedOption('Sulawesi Tenggara', $data->provinsi) }}>
                        Sulawesi Tenggara</option>
                    <option value="Maluku" {{ selectedOption('Maluku', $data->provinsi) }}>Maluku</option>
                    <option value="Maluku Utara" {{ selectedOption('Maluku Utara', $data->provinsi) }}>Maluku Utara
                    </option>
                    <option value="Papua" {{ selectedOption('Papua', $data->provinsi) }}>Papua</option>
                    <option value="Papua Barat" {{ selectedOption('Papua Barat', $data->provinsi) }}>Papua Barat
                    </option>
                    <option value="Papua Selatan" {{ selectedOption('Papua Selatan', $data->provinsi) }}>Papua Selatan
                    </option>
                    <option value="Papua Tengah" {{ selectedOption('Papua Tengah', $data->provinsi) }}>Papua Tengah
                    </option>
                    <option value="Papua Pegunungan" {{ selectedOption('Papua Pegunungan', $data->provinsi) }}>Papua
                        Pegunungan</option>
                    <option value="Papua Barat Daya" {{ selectedOption('Papua Barat Daya', $data->provinsi) }}>Papua
                        Barat Daya</option>
                </x-select>
                <x-invalid error="provinsi" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="tipe_client" :value="__('Tipe Klien')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-select name="tipe_client" id="tipe_client" autofocus>
                    <option value="pemerintah" {{ selectedOption('pemerintah', $data->tipe_client) }}>Pemerintah
                    </option>
                    <option value="swasta" {{ selectedOption('swasta', $data->tipe_client) }}>Swasta</option>
                    <option value="event" {{ selectedOption('event', $data->tipe_client) }}>Event</option>
                </x-select>
                <x-invalid error="tipe_client" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="kode_faktur" :value="__('Kode Faktur')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-select name="kode_faktur" id="kode_faktur" autofocus>
                    <option value="01" {{ selectedOption('01', $data->kode_faktur) }}>01</option>
                    <option value="02" {{ selectedOption('02', $data->kode_faktur) }}>02</option>
                    <option value="03" {{ selectedOption('03', $data->kode_faktur) }}>03</option>
                    <option value="04" {{ selectedOption('04', $data->kode_faktur) }}>04</option>
                </x-select>
                <x-invalid error="kode_faktur" />
            </div>
        </div>
        <div class="mb-3 row pe-0">
            <x-label for="vendor" :value="__('Nama Vendor')" class="col-md-3 col-form-label" />
            <div class="col-md-9 pe-0">
                <x-select name="vendor" id="vendor" autofocus>
                    @foreach ($vendor as $item)
                        <option value="{{ $item->id }}" {{ selectedOption($item->id, $data->vendor) }}>
                            {{ $item->nama_pt . ' - ' . $item->nama_bank . '/' . $item->no_rek }}</option>
                    @endforeach
                </x-select>
                <x-invalid error="vendor" />
            </div>
        </div>
        <small><em class="text-secondary">**Nama Pejabat dan Jabatan diisi sesuai dengan pada kontrak dan akan
                digunakan sebagai nama tertuju pada saat pembuatan invoice</em></small>
    </div>


    <div class="text-end">
        <x-button type="submit" class="btn btn-primary" :value="$data->id ? __('Simpan Perubahan Data') : __('Tambah Klien')" />
    </div>
</form>
