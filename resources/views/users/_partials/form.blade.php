<form action="{{ $user->id ? route('users.update', $user->id) : route('users.store') }}" method="POST">
    @csrf
    {{-- {{ $user->roles }} --}}
    @if ($user->id)
        @method('PUT')
    @endif
    <div class="row">
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <x-label for="nama" :value="__('Nama Lengkap')" />
                <x-input type="text" name="nama" id="nama" :placeholder="__('Nama Lengkap')" :value="old('nama', $user->nama)" autofocus />
                <x-invalid error="nama" />
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <x-label for="email" :value="__('Alamat Email')" />
                <x-input type="email" name="email" id="email" :placeholder="__('Alamat Email')" :value="old('email', $user->email)" />
                <x-invalid error="email" />
            </div>
        </div>
        <div class="col-12 col-lg-4">
            <div class="mb-3">
                <x-label for="role" :value="__('Role')" />
                <x-select name="role" id="role">
                    <option value="Admin">Admin</option>
                    <option value="Commercial">Commercial</option>
                    <option value="Finance">Finance</option>
                    <option value="Invoice">Invoicing</option>
                    <option value="Management">Management</option>
                </x-select>
                <x-invalid error="role" />
            </div>
        </div>
    </div>



    @if ($user->id)
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <x-label for="password" :value="__('Kata Sandi')" />
                    <x-input type="password" name="password" id="password" :placeholder="__('Kata Sandi')" />
                    <x-invalid error="password">
                        <small>{{ __('Kosongkan jika tidak merubah kata sandi') }}</small>
                    </x-invalid>
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Ulangi Kata Sandi')" />
                    <x-input type="password" name="password_confirmation" id="password_confirmation"
                        :placeholder="__('Ulangi Kata Sandi')" />
                    <x-invalid error="password_confirmation">
                        <small>{{ __('Kosongkan jika tidak merubah kata sandi') }}</small>
                    </x-invalid>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <x-label for="password" :value="__('Kata Sandi')" />
                    <x-input type="password" name="password" id="password" :placeholder="__('Kata Sandi')" />
                    <x-invalid error="password" />
                </div>
            </div>
            <div class="col-12 col-lg-6">
                <div class="mb-3">
                    <x-label for="password_confirmation" :value="__('Ulangi Kata Sandi')" />
                    <x-input type="password" name="password_confirmation" id="password_confirmation"
                        :placeholder="__('Ulangi Kata Sandi')" />
                    <x-invalid error="password_confirmation" />
                </div>
            </div>
        </div>
    @endif

    <div class="text-end">
        <x-button type="submit" class="btn btn-primary" :value="$user->id ? __('Simpan Perubahan Data') : __('Tambah Pengguna')" />
    </div>


</form>
