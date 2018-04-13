<?php

namespace App\Http\Controllers;

use App\History;
use App\FoodPlan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\ConvertHistoryToFoodplan;

/**
 * Class HistoryController
 * @package App\Http\Controllers
 */
class HistoryController extends Controller
{
    use ConvertHistoryToFoodplan;

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
        // we don't need to validate these requests because there is no user input to process.
        $user = auth()->user();
        $foodplan = $user->food_plan();
        $history = new History([
            'owner' => $user->id,
            'week' => Carbon::now()->weekOfYear,
        ]);

        foreach (FoodPlan::days() as $day)
        {
            $history->$day = $foodplan->$day;
        }

        $history->save();

        return redirect('history')->with(['message' => 'Plan saved to history!', 'alert_type' => 'success']);
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
     * @param  \Illuminate\Http\Request $request
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
    public function destroy($id)
    {
        // validate ownership
        $history = History::findOrFail($id);
        $owner = $history->owner();
        $user = Auth::user();

        if ($owner->id == $user->id) {
            $history->delete();
            return back()->with(['message' => 'History deleted', 'alert_type' => 'success']);
        }
        return back()->with(['message' => 'Unauthorized', 'alert_type' => 'error']);
    }

    public function setAsCurrentFoodplan($id)
    {
        $history = History::findOrFail($id);
        $this->ConvertHistoryToFoodplan($history);

        return back()->with('message', 'Foodplan set to plan from week ' . $history->week);
    }
}
