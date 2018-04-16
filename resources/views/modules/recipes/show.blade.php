@extends('layouts/app')

@php $foodplan = auth()->user()->food_plan(); @endphp

@section('content')
    <div class="row">
        <div class="col-8">
            <h1 class="primary">{{ $recipe->name }}</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-8">
            <div class="card">
                <div class="card-img-container">
                    <img class="card-img-top" src="{{ $recipe->getFirstMedia()->getUrl() }}" alt="{{ $recipe->name }}">
                    <div class="card-favorite">
                        @include('modules.recipes.partials.favorite')
                    </div>
                </div>
                <div class="card-body">
                    <p class="card-text">
                        {{ $recipe->description }}
                    </p>
                </div>
            </div>
        </div>
        <div class="col-4">
            <div class="card">
                <div class="card-body">
                    <i class="fal fa-star fa-fw"></i> {{ $recipe->averageRating($recipe) }}
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h2>Plan this meal on </h2>
                    @foreach ($foodplan->days() as $day)
                        @php $foodplan_day = $foodplan->$day() @endphp
                        @include('modules.foodplan.partials.plan-days', ['day' => $day, 'recipe' => $recipe, 'foodplan' => $foodplan, 'foodplan_day' => $foodplan_day])
                    @endforeach
                </div>
            </div>
            <br>
            <div class="card">
                <div class="card-body">
                    <h2 class="card-title">
                        Ingredients
                    </h2>
                    <ul>
                        @foreach ($recipe->ingredients() as $ingredient)
                            <li>{{ $ingredient->name }}, {{ $ingredient->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection