@extends('layouts/app')

@php $foodplan = auth()->user()->food_plan(); @endphp

@section('content')
    <div class="row">
        <div class="col-lg-3 col-sm-12">
            <a href="{{ route('favorites.index') }}" class="btn btn-primary">My favorites <i
                        class="fal fa-heart"></i></a>
            <a href="{{ route('favorites.index') }}" class="btn btn-primary">Suggestions <i
                        class="fal fa-badge-check"></i></a>
        </div>
        <div class="col-lg-6 col-sm-12">
            <form class="form-group">
                <div class="input-group">
                    <input class="form-control" type="search" id="search" placeholder="What are you craving for?"
                           aria-label="Type here to search">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search <i class="fal fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
        <div class="col-lg-3">
            <div class="pull-right">
                {{ $recipes->links() }}
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-12">
            <div class="owl-container">
                <div class="owl-carousel owl-theme">
                    @foreach($foodplan->days() as $day)
                        @php $recipe = $foodplan->$day(); @endphp
                        <div class="item">
                            @include('modules.foodplan.partials.foodplan-days', ['recipe' => $recipe])
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach($recipes as $recipe)
            <div class="col-lg-4 col-sm-12">
                    @include('modules.recipes.partials.recipe-card-full', ['foodplan' => $foodplan])
            </div>
        @endforeach
    </div>
@endsection