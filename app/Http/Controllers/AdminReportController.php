<?php

namespace App\Http\Controllers;

use App\AdminReport;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reports = AdminReport::all();

        return view('modules.admin.reports.index', compact('reports'));
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  $adminReport
     * @return \Illuminate\Http\Response
     */
    public function show($param)
    {
        $report = AdminReport::where('id', $param)
            ->orWhere('slug', $param)
            ->firstOrFail();

        return view('modules.admin.reports.show', compact('report'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\AdminReport  $adminReport
     * @return \Illuminate\Http\Response
     */
    public function edit(AdminReport $adminReport)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\AdminReport  $adminReport
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AdminReport $adminReport)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\AdminReport  $adminReport
     * @return \Illuminate\Http\Response
     */
    public function destroy(AdminReport $adminReport)
    {
        //
    }
}
