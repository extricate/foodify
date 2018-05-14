@extends('layouts.app')

@section('title', $report->slug)

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('admin.reports.show', $report) }}
    </div>
@endsection

@section('content')
    <div class="page mh-100 h-100">
        <div class="row">
            <div class="col-12">
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="h2 card-title">
                            Report of period: {{ $report->from }} ({{ Carbon\Carbon::parse($report->from)->format('F') }}) - {{ $report->till }} ({{ Carbon\Carbon::parse($report->till)->format('F') }})
                        </div>
                        <div class="card-text">
                            <ul class="list-unstyled">
                                <li>Total registered users: {{ $report->userCount }}</li>
                                <li>New users since this month: {{ $report->userCountDifference }}</li>
                            </ul>

                            <ul class="list-unstyled">
                                <li>Total amount of recipes: {{ $report->recipeCount }}</li>
                                <li>Created this month: {{ $report->differenceRecipeCreated }}</li>
                                <li>Updated this month: {{ $report->differenceRecipeUpdated }}</li>
                            </ul>

                            <ul class="list-unstyled">
                                <li>Our users posted this many comments: {{ $report->commentCount }}</li>
                                <li>That's {{ $report->commentCountDifference }} more comments since {{ $report->from }}.</li>
                            </ul>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection