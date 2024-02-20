<?php

namespace App\Charts;

use App\Models\Invoice;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class ForecastIncomeChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = Invoice::whereYear('period', date('Y'))->groupBy('bulan')
            ->selectRaw('sum(nominal) as sum, MONTH(period) as bulan')
            ->pluck('sum')->toArray();
        // dd($data);
        return $this->chart->barChart()
            ->addData('Total', $data)
            ->setXAxis(['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des'])
            ->setFontFamily('Arial')
            ->setFontColor('#330')
            ->setColors(['#333', '#b0b0b0']);
    }
}
