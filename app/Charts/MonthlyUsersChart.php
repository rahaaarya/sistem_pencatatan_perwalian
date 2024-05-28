<?php

namespace App\Charts;

use App\Http\Controllers\MahasiswaController;
use ArielMejiaDev\LarapexCharts\LarapexChart;

class MonthlyUsersChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\LineChart
    {
        $tahun = date('Y');
        $bulan = date('m');
        for ($i = 1; $i <= $bulan; $i++) {
            $totalmhs = MahasiswaController::userMahasiswa->whereYear('created_at, $tahun')->whereMonth('created_at', $i)->sum('jumlah');
            $dataChart['bulan'] = $i;
            $dataTotalMhs = $totalmhs;
        }
        dd($dataBulan);
        return $this->chart->lineChart()
            ->setTitle('Master Data')
            ->setSubtitle('Total Data')
            ->addData('Digital sales', [70, 29, 77, 28, 55, 45])
            ->setHeight(285)
            ->setXAxis(['January', 'February', 'March', 'April', 'May', 'June']);
    }
}
