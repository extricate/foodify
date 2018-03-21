@extends('layouts\app')

@section('content')
    <div class="row">
        <div class="col-12">
            <h1 class="primary">Your foodplan this week</h1>
        </div>
    </div>
    <div class="row">
        <div class="card-columns">
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Monday</h2>
                </div>
                @if ($foodplan->monday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->monday()])
                    <div class="card-body">
                        {{ Form::model($foodplan, array('route' => array('plan.update', $foodplan->id), 'method' => 'PUT')) }}
                        <a href="/recipes" class="btn btn-primary m-1">Something else?</a>
                        <input name="_method" type="hidden" value="PUT">
                        <input name="day" value="monday" type="hidden">
                        <input name="recipe" value="null" type="hidden">
                        <button type="submit" class="btn btn-warning">Clear day</button>
                        {{ Form::close() }}
                    </div>
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Tuesday</h2>
                </div>
                @if ($foodplan->tuesday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->tuesday()])
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Wednesday</h2>
                </div>
                @if ($foodplan->wednesday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->wednesday()])
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Thursday</h2>
                </div>
                @if ($foodplan->thursday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->thursday()])
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Friday</h2>
                </div>
                @if ($foodplan->friday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->friday()])
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Saturday</h2>
                </div>
                @if ($foodplan->saturday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->saturday()])
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">Sunday</h2>
                </div>
                @if ($foodplan->sunday() == !null)
                    @include('modules/foodplan/partials/plan-recipe', ['recipe' => $foodplan->sunday()])
                @else
                    @include('modules/foodplan/partials/empty-day')
                @endif
            </div>
        </div>
    </div>
@endsection