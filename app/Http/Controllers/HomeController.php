<?php

namespace App\Http\Controllers;

use App\User;
use App\Charts\DietaryChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foodplan = auth()->user()->food_plan();
        $chart = $this->chart();
        $users = $this->latestUsers();
        return view('home', compact([
            'foodplan', $foodplan,
            'chart', $chart,
            'users', $users
        ]));
    }

    /**
     * Kinda breaking the single responsibility principle here
     * Will have to find a better solution for that.
     * Still testing the functionality.
     * @return DietaryChart
     */
    public function chart()
    {
        $chart = new DietaryChart;

        // create the chart that is shown on the homepage.
        // we don't actually have statistic logic yet though, so for now it returns dummy data
        $chart
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

    public function latestUsers()
    {
        $users = User::all()->take(6)->sortByDesc('created_at');
        return $users;
    }
}
