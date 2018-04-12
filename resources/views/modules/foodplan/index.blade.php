@extends('layouts\app')

@section('content')
    <div class="row">
        <div class="col-8">
            <h1 class="primary">Your foodplan this week</h1>
        </div>
        <div class="col-4">


            @include('modules.foodplan.partials.save-to-history')
            @include('modules.foodplan.partials.suggest')
            @include('modules.foodplan.partials.delete')
        </div>
    </div>
    <div class="row">
        <div class="card-columns">
            @foreach($foodplan->days() as $day)
                <div class="card">
                    <h3 class="m-3 text-capitalize">{{ $day }}</h3>
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