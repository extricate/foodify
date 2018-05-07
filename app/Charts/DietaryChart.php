<?php

namespace App\Charts;

use ConsoleTVs\Charts\Classes\Chartjs\Chart;

class DietaryChart extends Chart
{
    /**
     * Initializes the chart.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function dummyChart()
    {
        // create the chart that is shown on the homepage.
        // we don't actually have statistic logic yet though, so for now it returns dummy data
        $chart = $this
            ->labels(['Fiber', 'Protein', 'Carbonhydrates', 'Vitamins', 'Minerals'])
            ->dataset('Your diet', 'doughnut', [
                100,
                65,
                84,
                45,
                90
            ])
            ->options([
                'borderColor' => ['#B3CC57', '#ECF081', '#FFBE40', '#EF746F', '#AB3E5B'],
                'backgroundColor' => ['#B3CC57', '#ECF081', '#FFBE40', '#EF746F', '#AB3E5B']
            ]);
        return $chart;
    }
}
