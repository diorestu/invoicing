<x-app-layout title="Data Klien">
    @if (count($data) >= 1)
        <div class="card mb-3">
            <div class="card-widget-separator-wrapper">
                <div class="card-body card-widget-separator">
                    <div class="row gy-3 gy-sm-1">
                        @foreach ($count as $key => $item)
                            @if ($loop->last)
                                <div class="col-sm-6 col-lg-3 mb-2">
                                    <div
                                        class="d-flex justify-content-between align-items-start card-widget-1 pb-3 pb-sm-0">
                                        <div>
                                            <h3 class="mb-1">{{ $item }}</h3>
                                            <p class="mb-0">{{ $key == '' ? 'Tanpa Kategori' : $key }}</p>
                                        </div>
                                    </div>
                                    <hr class="d-none d-sm-block d-lg-none me-4">
                                </div>
                            @else
                                <div class="col-sm-6 col-lg-3 mb-2">
                                    <div
                                        class="d-flex justify-content-between align-items-start card-widget-1 border-end pb-3 pb-sm-0">
                                        <div>
                                            <h3 class="mb-1">{{ $item }}</h3>
                                            <p class="mb-0">{{ $key == '' ? 'Tanpa Kategori' : $key }}</p>
                                        </div>
                                    </div>
                                    <hr class="d-none d-sm-block d-lg-none me-4">
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endif

    {{-- <div class="card">
        <div class="card-body">

        </div>
    </div> --}}

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Data Klien') }}
            </h5>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-baseline">
                    <a href="{{ route('client.create') }}" class="btn btn-primary">
                        {{ __('Tambah Baru') }}
                    </a>
                    <div class="d-flex justify-content-start gap-3">
                        <div class="form-group">
                            <select class="form-control form-select" name="fl_cabang" id="fl_cabang">
                                <option value="Bandara">Bandara
                                </option>
                                <option value="Kesehatan">Kesehatan
                                </option>
                                <option value="Manufaktur">
                                    Manufaktur
                                </option>
                                <option value="Pemerintahan">
                                    Pemerintahan
                                </option>
                                <option value="Perbankan">Perbankan
                                </option>
                                <option value="Logistik">Logistik
                                </option>
                                <option value="Lainnya">Lainnya
                                </option>
                            </select>
                        </div>
                        <div class="mb-0">
                            <x-input type="search" name="search" id="search" :placeholder="__('Cari')" />
                        </div>
                    </div>
                </div>
            </div>

            @include('client._partials.table')

        </div>
    </div>
</x-app-layout>
