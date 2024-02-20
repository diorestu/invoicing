<x-app-layout title="Home">
    <div class="card">
        <div class="card-body">
            Forecast Income Tahun 2024
            {!! $chart->container() !!}
        </div>
    </div>

    @push('js')
        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}
    @endpush
</x-app-layout>
