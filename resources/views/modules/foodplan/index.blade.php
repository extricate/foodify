@extends('layouts\app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="primary">Your foodplan this week</h1>
        </div>
    </div>
    <div class="row">
        <div class="card-columns">
            @foreach($foodplan->days() as $day)
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-title text-capitalize">{{ $day }}</h2>
                    </div>
                    @if ($foodplan->$day() == !null)
                        @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->$day()])
                        <div class="card-body">
                            @include('modules/foodplan/partials/clear', ['day' => $day, 'foodplan' => $foodplan])
                        </div>
                    @else
                        @include('modules/foodplan/partials/empty-day')
                    @endif
                </div>
            @endforeach
        </div>
    </div>
@endsection