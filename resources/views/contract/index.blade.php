<x-app-layout title="Kontrak">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                @if (request()->routeIs('contract.index'))
                    {{ __('Kontrak SDM') }}
                @else
                    {{ __('Kontrak Pekerjaan') }}
                @endif
            </h5>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-baseline">
                    @if (request()->routeIs('contract.index'))
                        <a href="{{ route('contract.create') }}" class="btn btn-primary">
                            {{ __('Tambah Baru') }}
                        </a>
                    @else
                        <a href="{{ route('contract.create-pekerjaan') }}" class="btn btn-primary">
                            {{ __('Tambah Baru') }}
                        </a>
                    @endif
                    <div class="d-flex mb-0">
                        {{-- <button id="delete-selected" class="btn btn-sm rounded-2 btn-danger me-2">
                            {{ __('Hapus') }}
                        </button> --}}
                        <x-input type="search" name="search" id="search" :placeholder="__('Cari')" />
                    </div>
                </div>
            </div>
            
            <div class="mb-1">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator border p-4 rounded-2">
                        <h6>Statistik Kontrak SDM</h6>
                        <div class="row gy-4 gy-sm-1">
                            <div class="col-sm-6 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-0 pb-sm-0">
                                    <div>
                                        <h4 class="mb-1">
                                            {{ number_format($count) }}
                                        </h4>
                                        <p class="mb-0">Total Kontrak SDM</p>
                                    </div>
                                    <div class="avatar me-sm-4">
                                        <span class="avatar-initial rounded bg-label-success">
                                            <i class="bx bx-check bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-0 pb-sm-0">
                                    <div>
                                        <h4 class="mb-1">{{ rupiah($sum) }}</h4>
                                        <p class="mb-0">Omset Kontrak SDM</p>
                                    </div>
                                    <div class="avatar me-sm-4">
                                        <span class="avatar-initial rounded bg-label-danger">
                                            <i class="bx bx-timer bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </div>
                            <div class="col-sm-6 col-lg-4">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-0 pb-sm-0">
                                    <div>
                                        <h4 class="mb-1">{{ rupiah($fee) }}</h4>
                                        <p class="mb-0">Total Fee Management</p>
                                    </div>
                                    <div class="avatar me-lg-4">
                                        <span class="avatar-initial rounded bg-label-danger">
                                            <i class="bx bx-file bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none">
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            

            @include('contract._partials.table')

        </div>
    </div>
</x-app-layout>
