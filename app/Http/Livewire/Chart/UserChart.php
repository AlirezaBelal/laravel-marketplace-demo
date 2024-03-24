<?php

namespace App\Http\Livewire\Chart;

use App\Charts\OrderChart;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UserChart extends Component
{
    public $chartDatasets = [[]];
    public $chartLabels = [];
    public $chartId = null;


    public function addDataToChart()
    {

        $value = User::select(DB::raw("(COUNT(*)) as count"),
            DB::raw("MONTHNAME(created_at) as month_name"))
            ->groupBy('month_name')->get()->toArray()
            ?? null;

        if ($value) {
            foreach ($value as $val) {
                $this->chartLabels[] = $val['month_name'];
                $this->chartDatasets[0][] = $val['count'];
            }
        }
    }

    public function render()
    {
        $this->addDataToChart();

        if (!$this->chartId) {

            $chart = new \App\Charts\UserChart($this->chartDatasets, $this->chartLabels);
            $this->chartId = $chart->id;
        }

        return view('livewire.chart.user-chart', [
            'chart' => $chart ?? null
        ]);
    }
}
