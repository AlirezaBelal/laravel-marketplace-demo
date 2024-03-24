<?php

declare(strict_types=1);

namespace App\Charts;

use Chartisan\PHP\Chartisan;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Http\Request;

class UserChart extends Chart
{
    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     *
     * @param  array  $datasets
     * @param  array  $labels
     */
    public function __construct($datasets = [[]], $labels = [])
    {
        parent::__construct();

        $this->loader(false);

        $this->options([
            'maintainAspectRatio' => false,
            'legend' => [
                'display' => true,
            ],
            'scales' => [
                'yAxes' => [
                    [
                        'ticks' => [
                            'maxTicksLimit' => 6,
                            'beginAtZero' => false,
                        ],
                    ],
                ],
                'xAxes' => [
                    [
                        'display' => true,
                    ],
                ],
            ],
        ]);

        $this->labels($labels);

        $this->dataset('کاربران', 'line', $datasets[0])->options([
            'backgroundColor' => 'rgb(127,156,245, 0.4)',
            'borderColor' => '#7F9CF5',
            'pointBackgroundColor' => 'rgb(255, 255, 255, 0)',
            'pointBorderColor' => 'rgb(255, 255, 255, 0)',
            'pointHoverBackgroundColor' => '#7F9CF5',
            'pointHoverBorderColor' => '#7F9CF5',
            'borderWidth' => 1,
            'pointRadius' => 1,
        ]);
    }

    /**
     * Handles the HTTP request for the given chart.
     * It must always return an instance of Chartisan
     * and never a string or an array.
     */
    public function handler(Request $request): Chartisan
    {
        return Chartisan::build()
            ->labels(['First', 'Second', 'Third'])
            ->dataset('Sample', [1, 2, 3])
            ->dataset('Sample 2', [3, 2, 1]);
    }
}
