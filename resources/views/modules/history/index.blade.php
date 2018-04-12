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
                        <div class="card">
                            <h3 class="m-3 text-capitalize">{{ $day }}</h3>
                            @include('modules/foodplan/partials/simple-plan-days', ['recipe' => $foodplan->$day()])
                        </div>
                    @endforeach
                    @include('modules.history.partials.delete', ['history' => $foodplan])
                </div>
            </div>
        @endforeach
    </div>
@endsection