<x-app-layout title="Riwayat">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                {{ __('Riwayat Pengelolaan Kontrak') }}
            </h5>

            <div class="mb-3">
                <div class="d-flex justify-content-between align-items-baseline">
                    <div class="d-flex mb-0">
                        {{-- <x-input type="search" name="search" id="search" :placeholder="__('Cari')" /> --}}
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-condensed table-striped">
                    <thead>
                        <tr>
                            <th></th>
                        </tr>
                    </thead>
                    @foreach ($data as $item)
                        <tbody>
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->contract->project }}</td>
                                <td>{{ $item->user->nama }} - {{ $item->keterangan }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            {{-- <div id="accordionPayment" class="accordion">
                @foreach ($data as $item)
                    <div class="card accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                aria-expanded="true" data-bs-target="#accordionPayment{{ $loop->iteration }}"
                                aria-controls="accordionPayment{{ $loop->iteration }}">
                                {{ $item->contract->project->nama }} - {{ $item->contract->nama_pekerjaan }}
                            </button>
                        </h2>

                        <div id="accordionPayment{{ $loop->iteration }}" class="accordion-collapse collapse">
                            <div class="accordion-body">
                                <em class="text-secondary">
                                    {{ $item->user->nama }} - {{ $item->keterangan }}
                                </em>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div> --}}
        </div>
    </div>
</x-app-layout>
