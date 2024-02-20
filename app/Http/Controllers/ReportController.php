<?php

namespace App\Http\Controllers;

use App\Charts\ForecastIncomeChart;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(ForecastIncomeChart $chart)
    {
        return view('report', ['chart' => $chart->build()]);
    }
}
