<?php

namespace App\Http\Controllers;

use App\Page;
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
        $this->middleware('admin')->only(['admin']);
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
        return view('home', compact([
            'foodplan',
            'chart'
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

    public function allPages()
    {
        $pages = Page::paginate(6);
        return $pages;
    }

    public function admin()
    {
        $users = $this->latestUsers();
        $comments = $this->latestComments();
        $pages = $this->allPages();
        return view('modules.admin.dashboard', compact([
            'users',
            'comments',
            'pages'
        ]));
    }
}
