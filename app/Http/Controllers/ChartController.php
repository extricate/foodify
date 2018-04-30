<?php

namespace App\Http\Controllers;

use App\Charts\DietaryChart;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ChartsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function chart()
    {
        $chart = new DietaryChart;
        // Additional logic depending on the chart approach
        return view('chart_view', ['chart' => $chart]);
    }
}