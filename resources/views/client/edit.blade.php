<x-app-layout title="Ubah Data Klien">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Ubah Data Klien') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('client.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
            </div>

            @include('client._partials.form')

        </div>
    </div>
</x-app-layout>
