<?php

namespace App\Http\Controllers;

use App\AdminReport;
use Illuminate\Http\Request;

class AdminReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->middleware('admin');
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
     * @param  \App\AdminReport  $adminReport
     * @return \Illuminate\Http\Response
     */
    public function show(AdminReport $adminReport)
    {
        //
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
