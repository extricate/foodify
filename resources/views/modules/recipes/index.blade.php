@extends('layouts/app')

@php $foodplan = auth()->user()->food_plan(); @endphp

@section('submenu')
    <div class="position-relative">
        <div class="align-self-center">
            {{ Breadcrumbs::render('recipes.index') }}
        </div>
        <div class="submenu-buttons">
            <a href="{{ route('favorites.index') }}" class="btn btn-primary">
                My favorites <i class="fal fa-heart"></i>
            </a>
            <a href="{{ route('favorites.index') }}" class="btn btn-primary">
                Suggestions <i class="fal fa-badge-check"></i>
            </a>
        </div>
    </div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 col-sm-12">
            <form class="form-group">
                <div class="input-group input-group-lg">
                    <input class="form-control" type="search" id="search" placeholder="What are you craving for?" aria-label="Type here to search">
                    <span class="input-group-append">
                        <button class="btn btn-primary" type="submit">Search <i class="fal fa-search"></i></button>
                    </span>
                </div>
            </form>
        </div>
    </div>
    <div class="row mb-sm-3 mb-md-0 mt-lg-1">
        <div class="col-12">
            <div class="owl-container">
                <div class="owl-carousel owl-theme">
                    @foreach($foodplan->days() as $day)
                        @php $recipe = $foodplan->$day(); @endphp
                        <div class="item">
                            @include('modules.foodplan.partials.plan-days-large', ['recipe' => $recipe])
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
    <div class="col d-flex d-justify-content-center">
        <div class="mx-auto">
            {{ $recipes->links() }}
        </div>
    </div>
@endsection