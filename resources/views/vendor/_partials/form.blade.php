<form action="{{ $data->id ? route('vendor.update', $data->id) : route('vendor.store') }}" method="POST">
    @csrf
    {{-- {{ $data->roles }} --}}
    @if ($data->id)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <x-label for="nama_pt" :value="__('Nama Perusahaan')" />
                <x-input type="text" name="nama_pt" id="nama_pt" :placeholder="__('Nama Perusahaan')" :value="old('nama_pt', $data->nama_pt)" autofocus />
                <x-invalid error="nama_pt" />
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <x-label for="nama_bank" :value="__('Nama Bank')" />
                <x-select name="nama_bank" id="nama_bank">
                    <option value="Mandiri">Mandiri</option>
                    <option value="BNI">BNI</option>
                    <option value="BRI">BRI</option>
                    <option value="BCA">BCA</option>
                    <option value="BTN">BTN</option>
                    <option value="CIMB">CIMB</option>
                    <option value="Permata">Permata</option>
                    <option value="Permata">BPD Bali</option>
                </x-select>
                <x-invalid error="nama_bank" />
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <x-label for="no_rek" :value="__('Nomor Rekening')" />
                <x-input type="text" name="no_rek" id="no_rek" :placeholder="__('Nomor Rekening')" :value="old('no_rek', $data->no_rek)" autofocus />
                <x-invalid error="no_rek" />
            </div>
        </div>
        <div class="col-12">
            <div class="mb-3">
                <x-label for="url_img" :value="__('Nama File')" />
                <x-input type="text" name="url_img" id="url_img" :placeholder="__('Nama File')" :value="old('url_img', $data->url_img)" autofocus />
                <x-invalid error="url_img" />
            </div>
        </div>
    </div>




    <div class="text-end">
        <x-button type="submit" class="btn btn-primary" :value="$data->id ? __('Simpan Perubahan Data') : __('Tambah Pengguna')" />
    </div>


</form>
