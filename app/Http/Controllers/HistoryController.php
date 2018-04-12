<?php

namespace App\Http\Controllers;

use App\History;
use App\Foodplan;
use Illuminate\Http\Request;
use Carbon\Carbon;

/**
 * Class HistoryController
 * @package App\Http\Controllers
 */
class HistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = auth()->user();
        $history = $user->history();
        return view('modules/history/index', compact('history'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        // we don't need to validate these requests because the function simply stored the current food plan.
        // might be revisited in the future.
        $user = auth()->user();
        $foodplan = $user->food_plan();
        $history = History::create([
            'owner' => $user->id,
            'week' => Carbon::now()->weekOfYear,
            'monday' => $foodplan->monday,
            'tuesday' => $foodplan->tuesday,
            'wednesday' => $foodplan->wednesday,
            'friday' => $foodplan->friday,
            'saturday' => $foodplan->saturday,
            'sunday' => $foodplan->sunday,
        ]);

        return redirect('plan');
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        // validate ownership
        $history->owner() == auth()->user();

        $history->delete();

        return back()->with('message', 'History deleted!');
    }
}
