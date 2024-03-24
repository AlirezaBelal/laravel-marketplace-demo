<div>

    <div wire:poll.5s>
        <div wire:ignore wire:key="{{$chartId}}">
            @if($chart)
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

        {{--    <script>--}}
        {{--        const ctx = document.getElementById('myChart').getContext('2d');--}}
        {{--        const myChart = new Chart(ctx, {--}}
        {{--            type: 'bar',--}}
        {{--            data: {--}}
        {{--                labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],--}}
        {{--                datasets: [{--}}
        {{--                    label: '# of Votes',--}}
        {{--                    data: [12, 19, 3, 5, 2, 3],--}}
        {{--                    backgroundColor: [--}}
        {{--                        'rgba(255, 99, 132, 0.2)',--}}
        {{--                        'rgba(54, 162, 235, 0.2)',--}}
        {{--                        'rgba(255, 206, 86, 0.2)',--}}
        {{--                        'rgba(75, 192, 192, 0.2)',--}}
        {{--                        'rgba(153, 102, 255, 0.2)',--}}
        {{--                        'rgba(255, 159, 64, 0.2)'--}}
        {{--                    ],--}}
        {{--                    borderColor: [--}}
        {{--                        'rgba(255, 99, 132, 1)',--}}
        {{--                        'rgba(54, 162, 235, 1)',--}}
        {{--                        'rgba(255, 206, 86, 1)',--}}
        {{--                        'rgba(75, 192, 192, 1)',--}}
        {{--                        'rgba(153, 102, 255, 1)',--}}
        {{--                        'rgba(255, 159, 64, 1)'--}}
        {{--                    ],--}}
        {{--                    borderWidth: 1--}}
        {{--                }]--}}
        {{--            },--}}
        {{--            options: {--}}
        {{--                scales: {--}}
        {{--                    y: {--}}
        {{--                        beginAtZero: true--}}
        {{--                    }--}}
        {{--                }--}}
        {{--            }--}}
        {{--        });--}}
        {{--    </script>--}}

    @endsection

</div>
