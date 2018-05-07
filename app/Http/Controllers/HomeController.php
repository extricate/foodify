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
        $chart->dummyChart();
        return $chart;
    }

    /**
     * Get a list of the latest users for the admin part of the dashboard
     * Again breaking single responsibility. In the future I would like this in a repository?
     */
    public function latestUsers()
    {
        $user = new User;
        $users = $user->latestUsers('6')->sortByDesc('created_at');
        return $users;
    }

    public function latestComments()
    {
        $comment = new Comment;
        $comments = $comment->latestComments(2)->sortByDesc('created_at');
        return $comments;
    }
}
