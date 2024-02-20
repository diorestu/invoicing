<x-app-layout title="Tagihan (Invoice)">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Tagihan (Invoice)') }}
            </h5>
            <div class="mb-3">
                <div class="card-widget-separator-wrapper">
                    <div class="card-body card-widget-separator border p-4 rounded-2">
                        <h6>Statistik Bulan Ini</h6>
                        <div class="row gy-4 gy-sm-1">
                            <div class="col-sm-6 col-lg-3">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1">
                                            {{ rupiah($dataPaid) }}
                                        </h3>
                                        <p class="mb-0">Invoice Terbayar Bulan Ini</p>
                                    </div>
                                    <div class="avatar me-sm-4">
                                        <span class="avatar-initial rounded bg-label-success">
                                            <i class="bx bx-check bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1">{{ $dataOverdue->count() }}</h3>
                                        <p class="mb-0">Invoice Overdue</p>
                                    </div>
                                    <div class="avatar me-sm-4">
                                        <span class="avatar-initial rounded bg-label-danger">
                                            <i class="bx bx-timer bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none me-4">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div
                                    class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                                    <div>
                                        <h3 class="mb-1">{{ rupiah($dataOverdue->sum('nominal')) }}</h3>
                                        <p class="mb-0">Invoice Belum Terbayar Bulan Ini</p>
                                    </div>
                                    <div class="avatar me-lg-4">
                                        <span class="avatar-initial rounded bg-label-danger">
                                            <i class="bx bx-file bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                                <hr class="d-none d-sm-block d-lg-none">
                            </div>
                            <div class="col-sm-6 col-lg-3">
                                <div
                                    class="d-flex justify-content-between align-items-start pb-3 pb-sm-0 card-widget-3">
                                    <div>
                                        <h3 class="mb-1">{{ rupiah($dataPaid) }}</h3>
                                        <p class="mb-0">Total Invoice Terbayar</p>
                                    </div>
                                    <div class="avatar">
                                        <span class="avatar-initial rounded bg-dark">
                                            <i class="bx bx-check-double bx-sm"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mb-3">
                <div class="d-flex justify-content-end align-items-baseline">
                    {{-- <a href="{{ route('invoice.create') }}" class="btn btn-primary">
                        {{ __('Tambah Baru') }}
                    </a> --}}
                    <div class="mb-0">
                        <x-input type="search" name="search" id="search" :placeholder="__('Cari')" />
                    </div>
                </div>
            </div>

            @include('invoice._partials.table')

        </div>
    </div>
</x-app-layout>
