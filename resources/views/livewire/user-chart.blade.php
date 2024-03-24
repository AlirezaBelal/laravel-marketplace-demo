<div>
    <div wire:poll.5s>
        <div wire:ignore wire:key="{{$chartId}}">
            @if($chart)
                {{dd($chart)}}
                {!! $chart->container() !!}
            @endif
        </div>
    </div>
    @section('chart')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>
        <script>
            window.livewire.on('chartUpdate', (chartId, labels, datasets) => {
                let chart = window[chartId].chart;
                chart.data.datasets.forEach((dataset, key) => {
                    dataset.data = datasets[key];
                });
                chart.data.labels = labels;
                chart.update();
            });
        </script>
        @if($chart)
            {!! $chart->script() !!}
        @endif
    @endsection
</div>
