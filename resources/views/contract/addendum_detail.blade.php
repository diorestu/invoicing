<x-app-layout title="Detail Addendum Kontrak">
    <div class="card">
        <div class="card-body">
            <div class="mb-4">
                <a href="{{ route('contract.index') }}" class="btn btn-dark">
                    {{ __('Kembali') }}
                </a>
            </div>
            <div class="d-flex justify-content-between align-items-center">
                <div class="">
                    <h5 class="card-title mb-1">{{ __('Detail Addendum Kontrak') }}</h5>
                    {{-- <h5 class="fw-bolder">{{ $data->project->nama }}</h5> --}}
                </div>
            </div>
            <hr class="mx-0">
        </div>
    </div>
</x-app-layout>
