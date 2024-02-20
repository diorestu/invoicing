<x-app-layout title="Home">
    <div class="card bg-transparent shadow-none border-0 mt-4 mb-3">
        <div class="card-body row p-0 pb-3">
            <div class="col-12 card-separator">
                <h3>Selamat Datang, {{ user()->name }} 👋🏻 </h3>
                <div class="col-12 col-lg-7">
                    <p>Berikut ini merupakan statistik dari data kelolaan PT Asta Nadi Karya Utama</p>
                </div>
                <div class="d-flex justify-content-between flex-wrap gap-3 me-5">
                    <div class="d-flex align-items-center gap-3 me-4 me-sm-0">
                        <span class=" bg-label-primary p-2 rounded">
                            <i class="bx bxs-user-account bx-sm"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">Klien Terdaftar</p>
                            <h4 class="text-primary mb-0">{{ $client }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="bg-label-info p-2 rounded">
                            <i class="bx bx-notepad bx-sm"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">Kontrak SDM Berjalan</p>
                            <h4 class="text-info mb-0">{{ $contractSdm }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="bg-label-info p-2 rounded">
                            <i class="bx bx-notepad bx-sm"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">Kontrak Pekerjaan Berjalan</p>
                            <h4 class="text-info mb-0">{{ $contractPk }}</h4>
                        </div>
                    </div>
                    <div class="d-flex align-items-center gap-3">
                        <span class="bg-label-warning p-2 rounded">
                            <i class="bx bxs-map-pin bx-sm"></i>
                        </span>
                        <div class="content-right">
                            <p class="mb-0">Wilayah Kerja </p>
                            <h4 class="text-warning mb-0">{{ $wilayah }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <div class="card-widget-separator-wrapper">
            <div class="card-body card-widget-separator">
                <div class="row gy-4 gy-sm-1">
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">{{ $invActive }}</h3>
                                <p class="mb-0">Invoice Aktif Bulan Ini</p>
                            </div>
                            <div class="avatar me-sm-4">
                                <span class="avatar-initial rounded bg-label-success">
                                    <i class="bx bx-user bx-sm"></i>
                                </span>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none me-4">
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div
                            class="d-flex justify-content-between align-items-start card-widget-2 border-end pb-3 pb-sm-0">
                            <div>
                                <h3 class="mb-1">{{ $invDone }}</h3>
                                <p class="mb-0">Invoice Terbayar Bulan Ini</p>
                            </div>
                            <div class="avatar me-lg-4">
                                <span class="avatar-initial rounded bg-label-danger">
                                    <i class="bx bx-file bx-sm"></i>
                                </span>
                            </div>
                        </div>
                        <hr class="d-none d-sm-block d-lg-none">
                    </div>
                    <div class="col-sm-6 col-lg-4">
                        <div class="d-flex justify-content-between align-items-start pb-3 pb-sm-0 card-widget-3">
                            <div>
                                <h3 class="mb-1">{{ rupiah($totalInvDone) }}</h3>
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
    {{-- <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">
                                {{ __('Congratulations ' . user()->name . ' 🎉') }}
                            </h5>
                            <p class="mb-4">
                                {{ __('You have done ') }}
                                <span class="fw-bold">
                                    {{ __('72%') }}
                                </span>
                                {{ __(' more sales today. Check your new badge in your profile.') }}
                            </p>

                            <a href="javascript:;" class="btn btn-sm btn-outline-primary">
                                {{ __('View Badges') }}
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/man-with-laptop-light.png') }}" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
</x-app-layout>
