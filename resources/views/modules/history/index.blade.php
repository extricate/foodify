@extends('layouts.app')

@section('title', 'History')

@section('submenu')
    {{ Breadcrumbs::render('history.index') }}
@endsection

@section('content')
    <div class="row justify-content-center">
        @foreach($history as $foodplan)
            <div class="card m-2">
                <div class="card-body">
                    @if($foodplan->created_automatically)
                        <div class="card-top-label">
                            <span class="badge badge-primary">created automatically</span>
                        </div>
                    @endif
                    <h3 class="m-3 text-capitalize">Plan of week {{ $foodplan->week }}</h3>
                    @foreach($foodplan->days() as $day)
                        <div class="p-1">
                            @include('modules.foodplan.partials.simple-plan-days', ['recipe' => $foodplan->$day()])
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    @include('modules.history.partials.set-as-foodplan', ['history' => $foodplan])
                    @include('modules.history.partials.delete', ['history' => $foodplan])
                </div>
            </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col d-flex d-justify-content-center">
            <div class="mx-auto">
                {{ $history->links() }}
            </div>
        </div>
    </div>
@endsection