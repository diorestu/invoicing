<x-app-layout title="Ubah Data Kontrak">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Ubah Data Kontrak') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('contract.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
            </div>
            @include('contract._partials.form')

        </div>
    </div>
</x-app-layout>
