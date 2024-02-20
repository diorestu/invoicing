<x-app-layout title="Tambah Vendor">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Tambah Vendor') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('vendor.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
            </div>

            @include('vendor._partials.form')

        </div>
    </div>
</x-app-layout>
