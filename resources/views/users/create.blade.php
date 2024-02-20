<x-app-layout title="Tambah Pengguna">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Tambah Pengguna') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('users.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
            </div>

            @include('users._partials.form')

        </div>
    </div>
</x-app-layout>
