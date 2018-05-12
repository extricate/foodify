@extends('layouts.app')

@section('title', 'All admin reports')

@section('submenu')
    <div class="align-self-center">
        {{ Breadcrumbs::render('admin.reports') }}
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col">
            @foreach($reports as $report)
                <div class="card mb-3">
                    <div class="card-body">
                        <div class="card-text">
                            <a href="{{ route('admin.report.show', $report->id) }}">
                                {{ $report->from }} - {{ $report->till }}
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection