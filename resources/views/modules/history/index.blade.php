@extends('layouts\app')

@section('content')
    <div class="row">
        <div class="col-8">
            <h1 class="primary">Your foodplan history</h1>
        </div>
        <div class="col-4">
        </div>
    </div>
    <div class="row">
        @foreach($history as $foodplan)
            <div class="card m-3">
                <div class="card-body">
                    <h3 class="m-3 text-capitalize">Plan of week {{ $foodplan->week }}</h3>
                    @foreach($foodplan->days() as $day)
                        <div class="p-1">
                            @include('modules/foodplan/partials/simple-plan-days', ['recipe' => $foodplan->$day()])
                        </div>
                    @endforeach
                </div>
                <div class="card-footer">
                    @include('modules.history.partials.set-as-foodplan', ['history' => $foodplan])
                    @include('modules.history.partials.delete', ['history' => $foodplan])
                </div>
            </div>
        @endforeach
            {{ $history->links() }}
    </div>
@endsection