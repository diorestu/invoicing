<x-app-layout title="Vendor">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Vendor') }}
            </h5>

            <div class="mb-2">
                <div class="d-flex justify-content-between align-items-baseline">
                    <a href="{{ route('vendor.create') }}" class="btn btn-primary">
                        {{ __('Tambah Baru') }}
                    </a>
                    <div class="mb-0">
                        <x-input type="search" name="search" id="search" :placeholder="__('Cari')" />
                    </div>
                </div>
            </div>

            @include('vendor._partials.table')

        </div>
    </div>
</x-app-layout>
