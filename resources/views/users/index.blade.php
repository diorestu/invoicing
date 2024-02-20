<x-app-layout title="Pengguna">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Pengguna') }}
            </h5>

            <div class="mb-2">
                <div class="d-flex justify-content-between align-items-baseline">
                    <a href="{{ route('users.create') }}" class="btn btn-primary">
                        {{ __('Tambah Baru') }}
                    </a>
                    <div class="mb-0">
                        <x-input type="search" name="search" id="search" :placeholder="__('Cari')" />
                    </div>
                </div>
            </div>

            @include('users._partials.table')

        </div>
    </div>
</x-app-layout>
