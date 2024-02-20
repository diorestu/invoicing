<x-app-layout title="Tambah Klien">
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <a href="{{ route('client.index') }}" class="btn btn-dark">
                    <i class="bx bx-arrow-back bx-xs"></i>
                    {{ __('Kembali') }}
                </a>
            </div>
            <h5 class="card-title">
                {{ __('Tambah Klien') }}
            </h5>
            <hr>


            @include('client._partials.form')

        </div>
    </div>
</x-app-layout>
