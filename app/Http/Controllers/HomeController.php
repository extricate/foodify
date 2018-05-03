<?php

namespace App\Http\Controllers;

use App\User;
use App\Comment;
use App\Charts\DietaryChart;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Create a new controller instance.
     * HomeController constructor.
     * @param DashboardRepository $repository
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
        $comments = $this->latestComments();
        return view('home', compact([
            'foodplan',
            'chart',
            'users',
            'comments'
        ]));
    }

    /**
     * Kinda breaking the single responsibility principle here
     * Will have to find a better solution for that.
     * Still testing the functionality though.
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

    /**
     * Get a list of the latest users for the admin part of the dashboard
     * Again breaking single responsibility. In the future I would like this in a repository?
     */
    public function latestUsers()
    {
        $users = User::all()->sortByDesc('created_at')->take(6);
        return $users;
    }

    public function latestComments()
    {
        $comments = Comment::all()->sortByDesc('created_at')->take(2);
        return $comments;
    }
}
