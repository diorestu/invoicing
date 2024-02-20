<x-app-layout title="Tambah Kontrak">
    @push('css')
        <link rel="stylesheet" href="{{ asset('assets/css/select2.css') }}" />
    @endpush

    @push('js')
        <script src="{{ asset('assets/js/select2.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#id_project').select2();
            });
        </script>
    @endpush
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Tambah Kontrak') }}
            </h5>

            <div class="mb-4">
                <a href="{{ route('contract.index') }}" class="btn btn-dark">
                    <i class="bx bx-arrow-back bx-xs"></i>
                    {{ __('Kembali') }}
                </a>
            </div>

            @include('contract._partials.form')

        </div>
    </div>
</x-app-layout>
