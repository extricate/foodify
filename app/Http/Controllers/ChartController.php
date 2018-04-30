<?php

namespace App\Http\Controllers;

use App\Charts\DietaryChart;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chart()
    {
        $chart = new DietaryChart;
        // Additional logic depending on the chart approach
        $chart->dataset('Sample', 'line', [100, 65, 84, 45, 90]);
        return view('chart_view', ['chart' => $chart]);
    }

    public function response()
    {
        $chart = new DietaryChart;
        $chart->dataset('Sample Test', 'bar', [3,4,1])->color('#00ff00');
        $chart->dataset('Sample Test', 'line', [1,4,3])->color('#ff0000');
        return $chart->api();
    }
}