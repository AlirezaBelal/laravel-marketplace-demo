<?php

namespace App\Http\Livewire\Chart;

use App\Charts\OrderChart;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class Chart extends Component
{

    public $chartDatasets = [[]];
    public $chartLabels = [];
    public $chartId = null;


    public function addDataToChart()
    {
//        $value = Order::get()?? null;
//        $value = Order::select(DB::raw("(COUNT(*)) as count"),
//            DB::raw("MONTHNAME(created_at) as month_name"))
//                ->groupBy('month_name')->get()->toArray()
//            ?? null;
        $value = Order::select(DB::raw("(COUNT(*)) as count"),
            DB::raw("YEAR(created_at) as year"))
            ->groupBy('year')->get()->toArray()
            ?? null;
//        $value = Http::get("https://api.coindesk.com/v1/bpi/currentprice.json')['bpi']['USD']['rate_float'] ?? null;

        if ($value) {
//            $time = now()->format('H:i:s');
//            $month1 = ['فروردین' ];
//            $month2 = ['اردیبهشت'];
//            $month2 = ['اردیبهشت','خرداد','تیر','مرداد','شهریور','مهر','آبان',
//                'آذر','دی','بهمن','اسفند'];
            foreach ($value as $val) {
                $this->chartLabels[] = $val['year'];
                $this->chartDatasets[0][] = $val['count'];
            }


//            if (count($this->chartLabels) > 36) {
//                unset($this->chartDatasets[0][0], $this->chartLabels[0]);
//                $this->chartLabels = array_values($this->chartLabels);
//                $this->chartDatasets[0] = array_values($this->chartDatasets[0]);
//            }
        }
    }

    public function render()
    {
        $this->addDataToChart();

        if (!$this->chartId) {
            $chart = new OrderChart($this->chartDatasets, $this->chartLabels);

            $this->chartId = $chart->id;
        }
//        else {
//            $this->emit('chartUpdate', $this->chartId, $this->chartLabels, $this->chartDatasets);
//        }

        return view('livewire.chart.chart', [
            'chart' => $chart ?? null
        ]);
    }
}
